document.getElementById('button1').addEventListener('click', loadEmployee);

document.getElementById('button2').addEventListener('click', loadEmployees);



// Display Single Employee
function loadEmployee() {
     // Create the object
     const xhr = new XMLHttpRequest();

     // Open the connection
     xhr.open('GET', 'employee.json', true);

     // Execute the function
     xhr.onload = function() {
          if(this.status === 200) {
               // Get the response as an Object
               const employee = JSON.parse( this.responseText );
               
               // Build the Template
               const output = `
                    <ul>
                         <li>ID: ${employee.id}</li>
                         <li>Name: ${employee.name}</li>
                         <li>Company: ${employee.company}</li>
                         <li>Job: ${employee.job}</li>
                    </ul>
               `;
               // Prints the HTML
               document.getElementById('employee').innerHTML = output;
          }
     }

     // Send the request
     xhr.send();

}

// Display all the Employees


function loadEmployees() {
     // Create the object
     const xhr = new XMLHttpRequest();

     // Open the connection
     xhr.open('GET', 'employees.json', true);

     // Execute the function
     xhr.onload = function() {
          if(this.status === 200) {
               // Get the response as an Object
               const employees = JSON.parse( this.responseText );
               
               let output = '';
               employees.forEach(function(employee) {
                    output += `
                         <ul>
                              <li>ID: ${employee.id}</li>
                              <li>Name: ${employee.name}</li>
                              <li>Company: ${employee.company}</li>
                              <li>Job: ${employee.job}</li>
                         </ul>
                    `;
               });

               document.getElementById('employees').innerHTML = output;
              
          }
     }

     // Send the request
     xhr.send();

}