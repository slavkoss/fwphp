<?php

namespace B12phpfw ;
use Closure ;

/**
 * User model which calls a resource intense repository method to get posts.
 */
class User
{
    private $posts; // @var array Post items

    private $ref_usr_posts_closure; // @var Closure Reference to a user repository

    // Set reference to a user repository method with Closure.  @param Closure
    public function setReference(Closure $ref_usr_posts_closure)
    {
        $this->ref_usr_posts_closure = $ref_usr_posts_closure;
    }
    //Fatal error: Uncaught TypeError: Argument 1 passed to B12phpfw\User::setReference() must be
    //   an instance of B12phpfw\Closure, instance of Closure given, called in
    //   ...\02_mvc\domain_m_lazy_load\UserRepository.php on line 74 and defined in 
    //   ...\02_mvc\domain_m_lazy_load\User.php:15 Stack trace:
    //#0 ...\02_mvc\domain_m_lazy_load\UserRepository.php(74): B12phpfw\User->setReference(Object(Closure))
    //#1 ...\02_mvc\domain_m_lazy_load\index.php(46): B12phpfw\UserRepository->findPostsByUsrId(18)
    //#2 {main} thrown in ...\02_mvc\domain_m_lazy_load\User.php on line 15

    /**
     * Get array of items retrieved from DB with method call of
     * repository. Retrieval from DB happens only once with
     * the help of lazy loading and therefore improves performance.
     *
     * @return array
     */
    public function getPosts()
    {
        if (!isset($this->posts)) {
            $ref_usr_posts_closure  = $this->ref_usr_posts_closure;
            $this->posts = $ref_usr_posts_closure();
        }

        return $this->posts;
    }
}
