<?php
/**
 * curlmaster
 * Wrapper for the cURL extension.
 *
 * @version    2020-10-02 06:11:00 UTC
 * @author     Peter Kahl <https://github.com/peterkahl>
 * @copyright  2015-2020 Peter Kahl
 * @license    Apache License, Version 2.0
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      <http://www.apache.org/licenses/LICENSE-2.0>
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace peterkahl\curlmaster;

use \Exception;
use \SplFileObject;


class curlmaster
{

  /**
   * Version
   * @var string
   */
  const VERSION='7.4.3';


  /**
   * URL of this project
   * @var string
   */
  const LIBURL='https://github.com/peterkahl/curlmaster';


  /**
   * Name of this library as first part of file name
   * @var string
   */
  const NAME_PREFIX='curlmaster_';


  /**
   * Naming of response files
   * @var string
   */
  CONST PREFIX_RESPONSE='response_';


  /**
   * Naming of cookie files
   * @var string
   */
  CONST PREFIX_COOKIE='cookie_';


  /**
   * Whether to enable debug mode.
   * If so, cURL responses are stored in debug files which may need
   * to be deleted manually.
   * @var boolean
   */
  public $EnableDebug=false;


  /**
   * Caching control & Maximum age of forced cache (in seconds).
   * All responses are cached, but when this value is>0, caching
   * will be forced regardless of the response headers.
   * @var integer .... value 0 disables forced caching while header-dependent caching is obeyed
   *                   value >0 enables forced caching and overrides header-dependent caching
   *                   value <0 disables caching altogether (example -1)
   */
  public $ForcedCacheMaxAge=0;


  /**
   * Cache directory
   * @var string
   */
  public $CacheDir;


  /**
   * Full path & file prefix
   * @var string
   */
  private $_file_prefix;


  private $_cookie_filename;


  private $_resp_filename;


  /**
   * Enable etags
   * @var boolean
   */
  public $EnableEtags;


  /**
   * Responses with etag will be cached this long.
   * @var integer
   */
  public $max_cache_age=31536000;


  /**
   * Enable compression of cache files.
   * @var boolean
   */
  const CACHECOMPRESS=false;


  /**
   * Whether to enable cookies.
   * @var boolean
   */
  public $EnableCookies=true;


  /**
   * Filename (incl. path) of CA certificate.
   * Your OpenSSL may already be compiled with a link to '/etc/ssl/certs',
   * but here you may specify your own etc.
   * @var string
   * You may download and install on your server this Mozilla CA bundle
   * from: <https://curl.haxx.se/docs/caextract.html>
   */
  public $ca_file;


  /**
   * Minimum TLS version
   * Best to leave this empty unless you know what you are doing.
   * @var string
   * Permissible values are '1.0', '1.1', '1.2', '1.3'
   */
  public $tlsver;


  /**
   * Cipher string
   * Optionally, you may define ciphers for TLS connection.
   * If you define this, it may conflict with the TLS version (above).
   * @var string .... example 'AESGCM:!PSK'
   */
  public $CipherString;


  /**
   * User Agent
   * You can define your own user agent.
   * @var string
   */
  public $useragent;


  /**
   * Timeout
   * @var integer
   */
  public $timeout_sec=30;


  /**
   * Manage redirects.
   * @var integer ... value 0  prevents following redirects
   *                  value >0 limits number of redirects to this number
   */
  public $maxRedirects=3;


  /**
   * Show verbose: If enabled (true), verbose details
   * will be shown within the output array.
   * Useful for debug of TLS connections, headers etc.
   * @var boolean
   */
  public $ShowVerboseDetails=true;


  /**
   * Request headers.
   * @var array
   * Example ... array('Connection: Close', 'X-API-Key: 7KgvBPUXh_XKQAMG');
   */
  public $headers;


  /**
   * Request headers.
   * @var array
   */
  private $_request_headers;


  /**
   * HTTP methods this library can handle.
   * @var array
   */
  private $_methods_allowed=array(
    'GET',
    'POST',
    'HEAD',
  );

  private $_request_method;

  private $_request_poststr;

  private $_request_url;

  /**
   * @var boolean
   */
  private $_request_secure;

  private $_tstart;


  /**
   * Makes HTTP Request
   * @param  string  $url
   * @param  string  $method
   * @param  array   $post ..... Data for method POST
   * @param  boolean $force .... Do not look in cache
   * @param  string  $tlsv ..... TLS version
   * @param  string  $cipher ... Optionally overrides cipher string
   * @return mixed
   * @throws \Exception
   */
  public function Request($url, $method='GET', $post=array(), $force=false, $tlsv='', $cipher='')
  {
    $this->_tstart=microtime(true);

    $this->_cookie_filename=null;
    $this->_file_prefix    =null;
    $this->_request_hash   =null;
    $this->_request_method =(string) $method;
    $this->_request_url    =null;
    $this->_request_headers=array();
    $this->_request_poststr='';
    $this->_request_secure =null;
    $this->_resp_filename  =null;

    $this->_check_cachedir();

    if (!$this->_is_url_valid($url)) {
      throw new Exception("Illegal value argument url");
    }

    $this->_request_url=$url;

    if (!$this->_is_method_valid($this->_request_method)) {
      throw new Exception("Illegal value argument method");
    }

    if ($this->_request_method==='POST') {
      if (!is_array($post) || empty($post)) {
        throw new Exception("Argument post must be non-empty array");
      }
      $this->_request_poststr=$this->_array2string($post);
    }

    if ($this->_request_method==='POST' || $this->_request_method==='HEAD') {
      $this->ForcedCacheMaxAge=-1;
      $this->EnableEtags=false;
    }

    if (empty($this->CipherString)) {$this->CipherString='';}

    if ($this->_is_request_secure()) {
      if (empty($this->ca_file)) {throw new Exception('Empty property ca_file');}
      if (!file_exists($this->ca_file)) {throw new Exception('Unable to read file '.$this->ca_file);}
    }
    else {$this->ca_file='';}

    if (empty($this->EnableEtags)) {$this->EnableEtags=false;}

    if (!is_integer($this->maxRedirects) || $this->maxRedirects<0) throw new Exception("Property maxRedirects must be integer >=0");

    if ($this->_request_method==='GET' && !$force && $this->ForcedCacheMaxAge>=0)
    {
      if (!empty($cached=$this->_fetch_from_cache())) {
        if ($this->EnableEtags===false) {
          $cached['origin']='cache';
          $cached['timestamp']=time();
          $cached['exectime']=$this->_stopwatch();
          return $cached;
        }
        else {
          if (!empty($cached['response']['etag'])) {
            $this->_add_request_header('if-none-match', $cached['response']['etag']);
          }
          if (!empty($cached['response']['last-modified'])) {
            $this->_add_request_header('if-modified-since', $cached['response']['last-modified']);
          }
        }
      }
    }

    $result=array(
      'library'=>array(
        'name'           =>__CLASS__,
        'version'        =>self::VERSION,
        'url'            =>self::LIBURL,
        'license'        =>'Apache License, Version 2.0',
        'copyright'      =>'2015-2020 Peter Kahl',
      ),
      'origin'         =>'new',
      'timestamp'      =>0,
      'exectime'       =>0,
      'status'         =>0,
      'forced'         =>$force,
      'cachingtime'    =>$this->ForcedCacheMaxAge,
      'cachecompress'  =>self::CACHECOMPRESS,
      'filename'       =>$this->_get_resp_filename(),
      'br-file-exists' =>(file_exists($this->_get_resp_filename())) ? true: false,
      'cookiefile'     =>($this->EnableCookies) ? $this->_get_cookie_filename(): '',
      'request'=>array(
        'method'         =>$this->_request_method,
        'url'            =>$this->_request_url,
        'user-agent'     =>$this->_get_ua_string(),
        'headers'        =>$this->_get_request_headers(),
        'etag-enable'    =>$this->EnableEtags,
        'ca-file'        =>$this->ca_file,
        'cipher'         =>$this->CipherString,
        'secure'         =>$this->_is_request_secure(),
        'post-data'      =>$this->_request_poststr,
      ),
      'verbose'=>array(),
      'response'=>array(
        'timestamp'      =>0,
        'exectime'       =>0,
        'status'         =>0,
        'cachingtime'    =>$this->ForcedCacheMaxAge,
        'headers'        =>array(),
        'error-num'      =>0,
        'error-verb'     =>'CURLE_OK',
        'etag'           =>'',
        'last-modified'  =>'',
        'body'           =>'',
      ),
    );

    $ch=curl_init($this->_request_url);

    if ($ch==false) throw new Exception("Failed to initialise cURL");

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->_request_method);

    switch ($this->_request_method) {
      case 'GET':
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        break;
      case 'POST':
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_request_poststr);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        break;
      case 'HEAD':
        curl_setopt($ch, CURLOPT_NOBODY, true);
        break;
      default:
        throw new Exception("Illegal value");
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout_sec);
    curl_setopt($ch, CURLOPT_USERAGENT, $this->_get_ua_string());

    if ($this->maxRedirects==0) {
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    }
    elseif ($this->maxRedirects>0) {
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_MAXREDIRS,$this->maxRedirects);
    }

    if ($this->ShowVerboseDetails===true) {
      $fileDetails=$this->_get_file_prefix().'details_'.$this->_randomstr($this->_get_request_hash()).'.tmp';
      $detailsStream=fopen($fileDetails, 'w+');
      flock($detailsStream, LOCK_EX);
      curl_setopt($ch, CURLOPT_VERBOSE, true);
      curl_setopt($ch, CURLOPT_STDERR, $detailsStream);
    }

    if ($this->EnableCookies) {
      curl_setopt($ch, CURLOPT_COOKIEJAR,  $this->_get_cookie_filename());
      curl_setopt($ch, CURLOPT_COOKIEFILE, $this->_get_cookie_filename());
    }

    if (!empty($this->_get_request_headers())) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, $this->_get_request_headers());
    }

    if ($this->_is_request_secure())
    {
      if (!empty($tlsv)) $this->tlsver=$tlsv;
      switch ($this->tlsver) {
      case '1.0':
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_0); break;
      case '1.1':
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_1); break;
      case '1.2':
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2); break;
      case '1.3':
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_3); break;
      default:
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT); break;
      }
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch, CURLOPT_CAINFO, $this->ca_file);
      if (!empty($cipher)) $this->CipherString=$cipher;
      if (!empty($this->CipherString)) {
        curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, $this->CipherString);
      }
    }

    $response=curl_exec($ch);
    $result['response']['error-num']=curl_errno($ch);

    $details=array();

    if ($this->ShowVerboseDetails===true) {
      rewind($detailsStream);
      $details=stream_get_contents($detailsStream);
      unlink($fileDetails);
      flock($detailsStream, LOCK_UN);
      fclose($detailsStream);
      $details=$this->_normalise_eol($details);
      $result['verbose']=explode("\n", $details);
      if ($this->_is_request_secure()) {
        foreach ($result['verbose'] as $line) {
          if (strrpos($line, "SSL certificate verify result: ")!==false) {$result['response']['error-num']=58; break;}
        }
      }
    }

    if ($result['response']['error-num']==0) {
      curl_close($ch);
      $resp_hdr=$this->_get_response_headers($response);
      $result['response']['headers']=$resp_hdr;
      if ($this->_request_method!=='HEAD') {
        $result['response']['body']=$this->_get_response_body($response);
      }
      $status=explode(' ', $resp_hdr['status']); # Can be: "HTTP/1.1 200 OK", "HTTP/2 200"
      $result['status']=(int)$status[1];
      if (!empty($resp_hdr['etag'])) {
        $result['response']['etag']=$resp_hdr['etag'];
      }
      if (!empty($resp_hdr['last-modified'])) {
        $result['response']['last-modified']=$resp_hdr['last-modified'];
      }
      if ($this->EnableEtags && !empty($cached) && $result['status']===304) {
        $cached['origin']='cache-304';
        $cached['timestamp']=time();
        $result['exectime']=$this->_stopwatch();
        return $cached;
      }
      $result['response']['status']=$result['status'];
      $cacheTime=$this->_response_caching_from_headers($resp_hdr);
      $result['response']['cachingtime']=$cacheTime;
      $result['response']['timestamp']=time();
      $result['response']['exectime']=$this->_stopwatch();
      $result['timestamp']=time();
      $result['exectime']=$this->_stopwatch();
      # Save to cache?
      if ($result['status']===200 && $this->ForcedCacheMaxAge>=0) {
        if ($this->ForcedCacheMaxAge>$cacheTime) {
          $cacheTime=$this->ForcedCacheMaxAge;
        }
        $result['cachingtime']=$cacheTime;
        if ($cacheTime>0) {
          if (self::CACHECOMPRESS===true) {
            $cacheString=gzcompress(serialize($result), 6);
          }
          else {
            $cacheString=json_encode($result, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
          }
          $this->_put_file_contents($this->_get_resp_filename(), $cacheString);
          return $result;
        }
      }
      return $result;
    }

    $info=curl_getinfo($ch);
    curl_close($ch);
    $result['response']['error-verb']=errors::_verbose($result['response']['error-num']);
    $result['response']['timestamp']=time();
    $result['exectime']=$this->_stopwatch();

    if (!$this->EnableDebug) return $result;

    $cver=errors::_curlinfo();

    throw new Exception("CURL ERROR No ".$result['response']['error-num'].". Details are --\n\n".
      errors::_rpadstr('ERROR').errors::_verbose($result['response']['error-num'])."\n".
      errors::_rpadstr('URL').$info['url']."\n".
      errors::_rpadstr('HTTP Code').$info['http_code']."\n".
      errors::_rpadstr('Connect Time').$info['connect_time']."\n".
      errors::_rpadstr('Total Time').$info['total_time']."\n".
      errors::_rpadstr('Name Lookup Time').$info['namelookup_time']."\n".
      errors::_rpadstr('This Library')."curlmaster/".self::VERSION."\n".
      errors::_rpadstr('PHP Version').errors::_phpversion()."\n".
      errors::_rpadstr('cURL Version').$cver['version']."\n".
      errors::_rpadstr('cURL Host').$cver['host']."\n".
      errors::_rpadstr('SSL Version').$cver['ssl_version']."\n".
      errors::_rpadstr('Supported Protocols').$cver['protocols']."\n\n"
    );
  }


  /**
   * Is request secure? If it uses https:.
   * @return boolean
   * @throws \Exception
   */
  private function _is_request_secure()
  {
    if (!empty($this->_request_secure) && is_bool($this->_request_secure)) {
      return $this->_request_secure;
    }
    if ($this->_request_secure===null) {
      if (empty($this->_request_url)) {
        throw new Exception("Property _request_url cannot be empty");
      }
      $this->_request_secure=(preg_match("/^https:/i", $this->_request_url)) ? true: false;
      return $this->_request_secure;
    }
    return (is_bool($this->_request_secure)) ? $this->_request_secure: false;
  }


  /**
   * Validates header.
   * @param  string
   * @return boolean
   */
  private function _valid_header($str)
  {
    return (preg_match('/^[\x20-\x7E]+:\ [\x20-\x7E]+$/', $str)) ? true: false;
  }


  /**
   * Loads and validates userd-defined array of request headers.
   * @throws \Exception
   */
  private function _load_request_headers()
  {
    $this->_request_headers=array();
    if (!empty($this->headers) && is_array($this->headers)) {
      foreach ($this->headers as $hdr)
      {
        if (!$this->_valid_header($hdr)) {
          throw new Exception("Header is invalid or contains illegal character ($hdr)");
        }
        list($name, $val)=explode(': ', $hdr);
        $name=strtolower($name);
        if (array_key_exists($name, $this->_request_headers)) {
          throw new Exception("Header $name already defined");
        }
        $this->_request_headers[$name]=trim($val); # array('cache-control'=>'max-age=0')
      }
    }
  }


  /**
   * Returns array of request headers.
   * @return array
   */
  private function _get_request_headers()
  {
    if (empty($this->_request_headers) && !empty($this->headers)) {
      $this->_load_request_headers();
    }
    $new=array();
    if (!empty($this->_request_headers)) {
      foreach ($this->_request_headers as $key=>$val)
      {
        $hdr=ucwords($key, '-').": $val";
        if (!$this->_valid_header($hdr)) {
          throw new Exception("Header is invalid or contains illegal character ($hdr)");
        }
        $new[]=$hdr;
      }
    }
    return $new;
  }


  /**
   * Add request header to existing headers.
   * @param  string
   * @param  string
   */
  private function _add_request_header($name, $val)
  {
    $name=strtolower($name);
    if (!empty($val=trim($val)))
    {
      $hdr="$name: $val";
      if (!$this->_valid_header($hdr)) {
        throw new Exception("Header is invalid or contains illegal character ($hdr)");
      }
      if (empty($this->_request_headers) && !empty($this->headers)) {
        $this->_load_request_headers();
      }
      if (array_key_exists($name, $this->_request_headers)) {
        throw new Exception("Header $name already defined");
      }
      $this->_request_headers[$name]=$val;
    }
  }


  /**
   * Returns filename prefix.
   * @return string
   */
  private function _get_file_prefix()
  {
    if (!empty($this->_file_prefix)) return $this->_file_prefix;
    $this->_file_prefix=rtrim($this->CacheDir, '/').'/'.self::NAME_PREFIX;
    return $this->_file_prefix;
  }


  /**
   * Returns filename of response file.
   * @return string
   */
  private function _get_resp_filename()
  {
    if (!empty($this->_resp_filename)) return $this->_resp_filename;
    $ext='.json';
    if (self::CACHECOMPRESS===true) $ext='.json.gz';
    $this->_resp_filename=$this->_get_file_prefix().self::PREFIX_RESPONSE.$this->_get_request_hash().$ext;
    return $this->_resp_filename;
  }


  /**
   * Returns hash string specific to the current request.
   * @return string
   */
  private function _get_request_hash()
  {
    if (!empty($this->_request_hash)) return $this->_request_hash;
    $this->_request_hash=substr(sha1($this->_request_method.$this->_request_url), 0, 30);
    return $this->_request_hash;
  }


  /**
   * Returns pseudo-random sha1 hash string.
   * @return string
   */
  private function _randomstr($str="")
  {
    return sha1(mt_rand().microtime().$str);
  }


  /**
   * Retrieves cached response.
   * @param  string
   * @return mixed
   */
  private function _fetch_from_cache()
  {
    $file=$this->_get_resp_filename();
    if (file_exists($file)) {
      $result=array();
      $ext=$this->_last_after_glue('.', $file);
      if ($ext==='gz') {
        $result=unserialize(gzuncompress($this->_get_file_contents($file)));
      }
      elseif ($ext==='json') {
        $result=json_decode($this->_get_file_contents($file), true);
      }
      if (empty($result)) {
        throw new Exception("Failed to process cached response $file");
      }
      if ($this->EnableEtags && !empty($result['etag'])) {
        $result['cachingtime']=$this->max_cache_age;
      }
      if (($result['response']['timestamp']+$result['cachingtime'])<time()) {
        unlink($file); return array();
      }
      $result['origin']='cache';
      return $result;
    }
    return array();
  }


  /**
   * Returns user agent string.
   * @return string
   */
  private function _get_ua_string()
  {
    return (!empty($this->useragent) && !preg_match('/[^ -~]/', $this->useragent)) ? $this->useragent : 'Mozilla/5.0 (curlmaster/'.self::VERSION.'; +'.self::LIBURL.')';
  }


  /**
   * Normalises EOL.
   * @param  string
   * @return string
   */
  private function _normalise_eol($str)
  {
    $str=str_replace("\r\n", "\n", $str); return str_replace("\r", "\n", $str);
  }


  /**
   * Validates HTTP Method string.
   * @param  string $str
   * @return boolean
   */
  private function _is_method_valid($str)
  {
    return (strlen($str)>2 && in_array($str, $this->_methods_allowed)) ? true: false;
  }


  /**
   * Validates URL string.
   * @param  string $url
   * @return boolean
   */
  private function _is_url_valid($url)
  {
    return (preg_match('/^https?:\/\/([a-z0-9]|[a-z0-9][a-z0-9\-]{0,61}[a-z0-9])(\.([a-z0-9]|[a-z0-9][a-z0-9\-]{0,61}[a-z0-9]))*(:\d{1,5})?\/\S*$/i', $url)) ? true: false;
  }


  /**
   * Converts array to string.
   * @param  array  $arr
   * @param  string $glue
   * @return string
   */
  private function _array2string($arr, $glue='&')
  {
    $new=array();
    foreach ($arr as $k=>$v) {
      $new[]=urlencode($k).'='.urlencode($v);
    }
    return implode($glue, $new);
  }


  /**
   * Parses headers from string.
   * @param  string $str
   * @return array
   */
  private function _get_response_headers($str)
  {
    $str=$this->_normalise_eol($str);
    $arr=explode("\n\n", $str);
    $str=$arr[0]; $arr=array();
    $arr=explode("\n", $str); $str=null;
    $new=array();
    foreach ($arr as $hdr) {
      $pos=strpos($hdr, ': ');
      if ($pos!==false) {
        $key=strtolower(substr($hdr, 0, $pos));
        $hdr=preg_replace('/\s+/', ' ', trim(substr($hdr, $pos+1)));
        if (isset($new[$key])) {
          if (isset($$key)) {
            $$key++;
          }
          else {
            $$key=1;
          }
          $new["$key-${$key}"]=$hdr;
        }
        else {$new[$key]=$hdr;}
      }
      else {$new['status']=$hdr;}
    }
    return $new;
  }


  /**
   * Parses body from string.
   * @param  string $str
   * @return string
   */
  private function _get_response_body($str)
  {
    $str=$this->_normalise_eol($str);
    $arr=explode("\n\n", $str); return $arr[1];
  }


  /**
   * Parses the response headers and returns the number of seconds
   * that will be the maximum caching time of our cached file.
   * @param  array
   * @return integer
   */
  private function _response_caching_from_headers($arr)
  {
    if (!empty($arr['expires'])) {
      if (preg_match('/^-\d+|0$/', $arr['expires'])) {
        return 0;
      }
      $sec=strtotime($arr['expires'])-time();
      return ($sec>0) ? $sec: 0;
    }
    if (!empty($arr['cache-control'])) {
      if (preg_match('/no-cache|no-store|max-age=0,?\b/', $arr['cache-control'])) {
        return 0;
      }
      if (preg_match('/\bmax-age=(\d+),?\b/', $arr['cache-control'], $match)) {
        return (integer) $match[1];
      }
    }
    return 0;
  }


  /**
   * Purges cache.
   * @throws \Exception
   */
  public function PurgeCache()
  {
    $this->_check_cachedir();
    $this->_file_prefix=null;
    foreach (glob($this->_get_file_prefix().self::PREFIX_RESPONSE.'*') as $file) {
      if (file_exists($file)) {
        $result=array();
        $ext=$this->_last_after_glue('.', $file);
        if ($ext==='gz') {
          $result=unserialize(gzuncompress($this->_get_file_contents($file)));
        }
        elseif ($ext==='json') {
          $result=json_decode($this->_get_file_contents($file), true);
        }
        if (empty($result)) {
          throw new Exception("Failed to process cached response $file");
        }
        if (!empty($result['etag'])) {
          $result['cachingtime']=$this->max_cache_age;
        }
        if (($result['timestamp']+$result['cachingtime'])<time()) {
          unlink($file);
        }
      }
    }
    foreach (glob($this->_get_file_prefix().self::PREFIX_COOKIE.'*') as $file) {
      $arr=$this->_parse_cookie_file($file);
      $this->_write_cookie_file($arr, $file);
    }
  }


  /**
   * Parses a cookie file.
   * @param  string $file
   * @return mixed
   */
  private function _parse_cookie_file($file)
  {
    $cookies=array();
    $str=$this->_get_file_contents($file);
    list($header, $lines)=explode("\n\n", $str);
    $lines=explode("\n", $lines);
    foreach ($lines as $line) {
      $biscuit=array();
      $httponly=false;
      if (substr($line, 0, 10)==='#HttpOnly_') {
        $line=substr($line, 10);
        $httponly=true;
      }
      if (!empty($line[0]) && substr_count($line, "\t")===6) {
        $tok=explode("\t", $line);
        $tok=array_map('trim', $tok);
        $biscuit=array(
          'httponly'          =>$httponly,
          'domain'            =>$tok[0],
          'include-subdomains'=>$tok[1],
          'path'              =>$tok[2],
          'secure'            =>$tok[3],
          'expires'           =>(int) $tok[4],
          'name'              =>$tok[5],
          'value'             =>$tok[6],
        );
        $cookies[]=$biscuit;
      }
    }
    return $cookies;
  }


  /**
   * Writes a cookie file & deletes expired cookies.
   * @param  mixed  $arr
   * @param  string $file
   */
  private function _write_cookie_file($arr, $file)
  {
    $new=''; $ctold=count($arr); $ctnew=0;
    foreach ($arr as $key=>$val) {
      if ($val['expires']>time()) {
        $ctnew++;
        if ($val['httponly']) {
          $new.='#HttpOnly_';
        }
        $new.=$val['domain']."\t".
              $val['include-subdomains']."\t".
              $val['path']."\t".
              $val['secure']."\t".
              $val['expires']."\t".
              $val['name']."\t".
              $val['value']."\n";
      }
    }
    if ($ctnew===0) {
      if (file_exists($file)) {
        unlink($file);
      }
      return;
    }
    if ($ctnew<$ctold) {
      $this->_put_file_contents($file, "# Netscape HTTP Cookie File\n".
        "# https://curl.haxx.se/docs/http-cookies.html\n".
        "# This file was generated by ".__CLASS__." on ".date('Y-m-d H:i:s T').".\n\n$new");
    }
  }


  /**
   * Checks whether cache directory is defined & exists.
   *
   * @throws \Exception
   */
  private function _check_cachedir()
  {
    if (empty($this->CacheDir) || strpos($this->CacheDir, "\0")!==false) {
      throw new Exception("Illegal value property CacheDir");
    }
    if (!file_exists($this->CacheDir) || !is_dir($this->CacheDir)) {
      throw new Exception("Directory ".$this->CacheDir." does not exist or not a directory");
    }
  }


  /**
   * Generates cookie filename.
   * @return string
   */
  private function _get_cookie_filename()
  {
    if (!empty($this->cookie_filename)) {
      return $this->cookie_filename;
    }
    $host=parse_url($this->_request_url, PHP_URL_HOST);
    $this->cookie_filename=$this->_get_file_prefix().self::PREFIX_COOKIE.urlencode(strtolower($host)).'.cookie';
    return $this->cookie_filename;
  }


  /**
   * Subtracts two floats and returns the result.
   * @return string
   */
  private function _stopwatch()
  {
    return microtime(true)-$this->_tstart;
  }


  /**
   * Saves string inside a file
   * @param  string  $file
   * @param  string  $str
   * @return mixed
   */
  private function _put_file_contents($file, $str)
  {
    $fileObj=new SplFileObject($file, 'w');
    while (!$fileObj->flock(LOCK_EX)) {
      usleep(1);
    }
    $bytes=$fileObj->fwrite($str);
    $fileObj->flock(LOCK_UN);
    return $bytes;
  }


  /**
   * Retrieves contents of a file
   * @param  string  $file
   * @return string
   */
  private function _get_file_contents($file)
  {
    $fileObj=new SplFileObject($file, 'r');
    while (!$fileObj->flock(LOCK_EX)) {
      usleep(1);
    }
    $size=$fileObj->getSize();
    if ($size===0) {
      $fileObj->flock(LOCK_UN);
      return '';
    }
    $str=$fileObj->fread($size);
    $fileObj->flock(LOCK_UN);
    return $str;
  }


  /**
   * Returns the last element after a glue.
   * Eg, "first-second-last">"last"
   * @param  string  $glue ..... delimiter
   * @param  string  $str ...... haystack
   * @return string
   */
  private function _last_after_glue($glue, $str)
  {
    return (strpos($str, $glue)===false) ? $str: substr(strrchr($str, $glue), 1);
  }

}
