document.querySelector('#load').addEventListener('click',  loadPosts);


function loadPosts() {
     // Create the object
     const xhr = new XMLHttpRequest();

     // Open the connection
     xhr.open('GET', 'https://jsonplaceholder.typicode.com/posts', true);

     // Execute the function
     xhr.onload = function() {
          if(this.status === 200) {
               const response = JSON.parse( this.responseText );

               // print the contents
               let output = '';

               var v_ii=0;
               response.forEach(function(post) {
                    v_ii++ ;
                    post.title = v_ii + '. ' + post.title ;
                    output += `
                         <h3>${post.title}</h3>
                         <p>${post.body}</p>
                    `;
               });
               document.querySelector('#result').innerHTML = output;
          }
     }

     // S e n d  the r e q u e s t
     xhr.send();
}