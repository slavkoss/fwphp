  <footer>
     &copy; InetJokeDB 2022.06.18
     <?php
        echo '<pre>'; //print_r($variables) ;
        echo '<br>$urlqry='.$variables['urlqry']
            .'<br>array $route = explode(\'/\', $urlqry)'
            .'<br>$controllerName=array_shift($route) = '. $variables['controllerName']
            .'<br>$action=2nd array_shift($route)='.$variables['action']
        ;
        echo '</pre>' ;
  ?>
  </footer>
  </body>
</html>
