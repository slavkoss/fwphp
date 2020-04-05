$routes['']=Array
(
  [GET] => Array
    (
      [controller] => Ijdb\Controllers\Joke Object
      (
        [authorsTable:Ijdb\Controllers\Joke:private] => Ninja\DatabaseTable Object
        (
            [pdo:Ninja\DatabaseTable:private] => PDO Object ()
            [table:Ninja\DatabaseTable:private] => author
            [primaryKey:Ninja\DatabaseTable:private] => id
            [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Author
            [constructorArgs:Ninja\DatabaseTable:private] => Array
            (
              [0] => Ninja\DatabaseTable Object
              (
                [pdo:Ninja\DatabaseTable:private] => PDO Object ()
                [table:Ninja\DatabaseTable:private] => joke
                [primaryKey:Ninja\DatabaseTable:private] => id
                [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Joke
                [constructorArgs:Ninja\DatabaseTable:private] => Array
                (
                  [0] => Ninja\DatabaseTable Object
*RECURSION*
                  [1] => Ninja\DatabaseTable Object
                      (
                          [pdo:Ninja\DatabaseTable:private] => PDO Object
                              (
                              )

                          [table:Ninja\DatabaseTable:private] => joke_category
                          [primaryKey:Ninja\DatabaseTable:private] => categoryId
                          [className:Ninja\DatabaseTable:private] => \stdClass
                          [constructorArgs:Ninja\DatabaseTable:private] => Array
                              (
                              )

                      )
                )
              )

            )

        )

                    [jokesTable:Ijdb\Controllers\Joke:private] => Ninja\DatabaseTable Object
                        (
                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                (
                                )

                            [table:Ninja\DatabaseTable:private] => joke
                            [primaryKey:Ninja\DatabaseTable:private] => id
                            [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Joke
                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                (
                                    [0] => Ninja\DatabaseTable Object
                                        (
                                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                (
                                                )

                                            [table:Ninja\DatabaseTable:private] => author
                                            [primaryKey:Ninja\DatabaseTable:private] => id
                                            [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Author
                                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                (
                                                    [0] => Ninja\DatabaseTable Object
 *RECURSION*
                                                )

                                        )

                                    [1] => Ninja\DatabaseTable Object
                                        (
                                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                (
                                                )

                                            [table:Ninja\DatabaseTable:private] => joke_category
                                            [primaryKey:Ninja\DatabaseTable:private] => categoryId
                                            [className:Ninja\DatabaseTable:private] => \stdClass
                                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                (
                                                )

                                        )

                                )

                        )

                    [categoriesTable:Ijdb\Controllers\Joke:private] => Ninja\DatabaseTable Object
                        (
                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                (
                                )

                            [table:Ninja\DatabaseTable:private] => category
                            [primaryKey:Ninja\DatabaseTable:private] => id
                            [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Category
                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                (
                                    [0] => Ninja\DatabaseTable Object
                                        (
                                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                (
                                                )

                                            [table:Ninja\DatabaseTable:private] => joke
                                            [primaryKey:Ninja\DatabaseTable:private] => id
                                            [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Joke
                                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                (
                                                    [0] => Ninja\DatabaseTable Object
                                                        (
                                                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                                (
                                                                )

                                                            [table:Ninja\DatabaseTable:private] => author
                                                            [primaryKey:Ninja\DatabaseTable:private] => id
                                                            [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Author
                                                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                                (
                                                                    [0] => Ninja\DatabaseTable Object
 *RECURSION*
                                                                )

                                                        )

                                                    [1] => Ninja\DatabaseTable Object
                                                        (
                                                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                                (
                                                                )

                                                            [table:Ninja\DatabaseTable:private] => joke_category
                                                            [primaryKey:Ninja\DatabaseTable:private] => categoryId
                                                            [className:Ninja\DatabaseTable:private] => \stdClass
                                                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                                (
                                                                )

                                                        )

                                                )

                                        )

                                    [1] => Ninja\DatabaseTable Object
                                        (
                                            [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                (
                                                )

                                            [table:Ninja\DatabaseTable:private] => joke_category
                                            [primaryKey:Ninja\DatabaseTable:private] => categoryId
                                            [className:Ninja\DatabaseTable:private] => \stdClass
                                            [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                (
                                                )

                                        )

                                )

                        )

                    [authentication:Ijdb\Controllers\Joke:private] => Ninja\Authentication Object
                        (
                            [users:Ninja\Authentication:private] => Ninja\DatabaseTable Object
                                (
                                    [pdo:Ninja\DatabaseTable:private] => PDO Object
                                        (
                                        )

                                    [table:Ninja\DatabaseTable:private] => author
                                    [primaryKey:Ninja\DatabaseTable:private] => id
                                    [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Author
                                    [constructorArgs:Ninja\DatabaseTable:private] => Array
                                        (
                                            [0] => Ninja\DatabaseTable Object
                                                (
                                                    [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                        (
                                                        )

                                                    [table:Ninja\DatabaseTable:private] => joke
                                                    [primaryKey:Ninja\DatabaseTable:private] => id
                                                    [className:Ninja\DatabaseTable:private] => \Ijdb\Entity\Joke
                                                    [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                        (
                                                            [0] => Ninja\DatabaseTable Object
 *RECURSION*
                                                            [1] => Ninja\DatabaseTable Object
                                                                (
                                                                    [pdo:Ninja\DatabaseTable:private] => PDO Object
                                                                        (
                                                                        )

                                                                    [table:Ninja\DatabaseTable:private] => joke_category
                                                                    [primaryKey:Ninja\DatabaseTable:private] => categoryId
                                                                    [className:Ninja\DatabaseTable:private] => \stdClass
                                                                    [constructorArgs:Ninja\DatabaseTable:private] => Array
                                                                        (
                                                                        )

                                                                )

                                                        )

                                                )

                                        )

                                )

                            [usernameColumn:Ninja\Authentication:private] => email
                            [passwordColumn:Ninja\Authentication:private] => password
                        )

                )

            [action] => home
        )

)