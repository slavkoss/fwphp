//J:\awww\apl\dev1\04knjige\kalendar\kal\js\app.js
"use strict";

// Makes sure the document is ready before executing scripts
jQuery( function($)
{

  //      CRUD  R O U T E R / D I S P A T C H E R
  // processFile = File to which app.js AJAX requests should be sent
  var bckProcScript = "inc/route_crud.uklj.php", 

  // 1. FNS TO MANIPULATE MODAL WINDOW
  fx = 
  {
          // Checks for a modal window and returns it, or
          // else creates a new one and returns that
          "initModal" : function() {
                  // If no elements are matched, the length
                  // property will be 0
                  if ( $(".modal-window").length==0 )
                  {
                      // Creates a div, adds a class, and
                      // appends it to the body tag
                      return $("<div>")
                              .hide()
                              .addClass("modal-window")
                              .appendTo("body");
                  }
                  else
                  {
                      // Returns the modal window if one
                      // already exists in the DOM
                      return $(".modal-window");
                  }
              },

          // Adds the window to the markup and fades it in
          "boxin" : function(data, modal) {
                  // Creates an overlay for the site, adds
                  // a class and a click event handler, then
                  // appends it to the body element
                  $("<div>")
                      .hide()
                      .addClass("modal-overlay")
                      .click(function(event){
                              // Removes event
                              fx.boxout(event);
                          })
                      .appendTo("body");

                  // Loads data into the modal window and
                  // appends it to the body element
                  modal
                      .hide()
                      .append(data)
                      .appendTo("body");

                  // Fades in the modal window and overlay
                  $(".modal-window,.modal-overlay")
                      .fadeIn(0); //.fadeIn("slow");
              },

          // Fades out the window and removes it from the DOM
          "boxout" : function(event) 
          {
                  // If an event was triggered by the element
                  // that called this function, prevents the
                  // default action from firing
                  if ( event!=undefined )
                  {
                      event.preventDefault();
                  }

                  // Removes the active class from all links
                  $("a").removeClass("active");

                  // Fades out the modal window and overlay,
                  // then removes both from the DOM entirely
                  $(".modal-window,.modal-overlay")
                      //.fadeOut( "slow", function() {
                      .fadeOut( 0, function() { // or 1000
                              $(this).remove();
                          }
                      );
          },

          // Adds a new r o w  to the markup after saving
          "addevent" : function(data, formData){
                  // Converts the query string to an object
                  var entry = fx.deserialize(formData),

                  // Makes a date object for current month
                      cal = new Date(NaN),

                  // Makes a date object for the new r o w
                      event = new Date(NaN),

                  // Extracts the event day, month, and year
                      date = entry.event_start.split(' ')[0],

                  // Splits the event data into pieces
                      edata = date.split('-'),

                  // Extracts the calendar month from the H2 ID
                      cdata = $("h2").attr("id").split('-');

                  // Sets the date for the calendar date object
                  cal.setFullYear(cdata[1], cdata[2], 1);

                  // Sets the date for the event date object
                  event.setFullYear(edata[0], edata[1], edata[2]);

                  // Since the date object is created using
                  // GMT, then adjusted for the local timezone,
                  // adjust the offset to ensure a proper date
                  event.setMinutes(event.getTimezoneOffset());

                  // If the year and month match, start the process
                  // of adding the new r o w 
                  if ( cal.getFullYear()==event.getFullYear()
                          && cal.getMonth()==event.getMonth() )
                  {
                      // Gets the day of the month for r o w
                      var day = String(event.getDate());

                      // Adds a leading zero to 1-digit days
                      day = day.length==1 ? "0"+day : day;

                      // Adds the new date link
                      $("<a>")
                          .hide()
                          .attr("href", "read.php?event_id="+data)
                          .text(entry.event_title)
                          .insertAfter($("strong:contains("+day+")"))
                          .delay(1000)
                          .fadeIn(0); //.fadeIn("slow");
                  }
              },

          // Removes an event from the markup after deletion
          "removeevent" : function()
          {
                  // Removes any event with the class "active"
                  $(".active")
                      //.fadeOut("slow", function(){
                      .fadeOut( 0, function() { // or 1000
                              $(this).remove();
                          });
          },

          // Deserializes the query string and returns
          // an event object
          "deserialize" : function(str){
                  // Breaks apart each name-value pair
                  var data = str.split("&"),

                  // Declares variables for use in the loop
                      pairs=[], entry={}, key, val;

                  // Loops through each name-value pair
                  for (var x in data )
                  {
                      // Splits each pair into an array
                      pairs = data[x].split("=");

                      // The first element is the name
                      key = pairs[0];

                      // Second element is the value
                      val = pairs[1];

                      // Reverses the URL encoding and stores
                      // each value as an object property
                      entry[key] = fx.urldecode(val);
                  }
                  return entry;
              },

          // Decodes a query string value
          "urldecode" : function(str) {
                  // Converts plus signs to spaces
                  var converted = str.replace(/\+/g, ' ');

                  // Converts any encoded entities back
                  return decodeURIComponent(converted);
              }

  }; // e n d  1. FNS TO MANIPULATE MODAL WINDOW
  
  
  

  // Set a default font-size value for dateZoom
  //$.fn.dateZoom.defaults.fontsize = "13px";

  // 2. B O D Y  O N  C L I C K  L I N K
  //    PULLS UP EVENTS IN MODAL WINDOW and attaches zoom effect
  $("body")
      // .dateZoom()
      .on( "click", "li>a", function(event)
      {
          // Stops the link from loading read.php
          event.preventDefault();

          // Adds an "active" class to the link
          $(this).addClass("active");

          // Gets the query string from the link href
          var data = $(this)
                          .attr("href")
                          .replace(/.+?\?(.*)$/, "$1"),

          // Checks if the modal window exists and
          // selects it, or creates a new one
              modal = fx.initModal();

          // Creates a button to close the window
          $("<a>")
              .attr("href", "#")
              .addClass("modal-close-btn")
              .html("&times;")
              .click(function(event){
                          // Removes modal window
                          fx.boxout(event);
                      })
              .appendTo(modal);

          // Loads the event data from the DB
          $.ajax({
                  type: "POST",
                  url: bckProcScript,
                  data: "action=rread&" + data,
                  success: function(data){
                          fx.boxin(data, modal);
                      },
                  error: function(msg) {
                          modal.append(msg);
                      }
              });

      }); // e n d  2. b o d y  o n  c l i c k  l i n k
      
      
      
      

  // 3. B O D Y  O N  C L I C K  B U T T O N  editing form
  //    Displays EDIT FORM AS A MODAL WINDOW
  $("body")
    .on("click", ".admin-options form,.admin", function(event)
    {
      // Prevents the form from submitting
      event.preventDefault();

      // Sets the action for the form submission
      var action = 
        $(event.target).attr("name") || "rfrm",

      // Saves the value of the event_id input
      id = $(event.target)
              .siblings("input[name=event_id]").val();

      // Creates an additional param for the ID if set
      id = ( id!=undefined ) ? "&event_id="+id : "";

      // Loads editing form and displays it
      $.ajax(
      {
        type: "POST",
        url: bckProcScript,
        data: "action="+action+id,
        success: function(data)
        {
          // Hides the form
          var form = $(data).hide(),

          // Make sure the modal window exists
              modal = fx.initModal()
                  .children(":not(.modal-close-btn)")
                      .remove()
                      .end();

          // Call the boxin function to create
          // the modal overlay and fade it in
          fx.boxin(null, modal);

          // Load the form into the window,
          // fades in the content, and adds
          // a class to the form
          form
              .appendTo(modal)
              .addClass("edit-form")
             .fadeIn(0); //.fadeIn("slow");
        },
        error: function(msg){
            alert(msg);
        }
      });
    }); //e n d  3. b o d y  o n  c l i c k  btn editing form

    
    
    
    
  // 4. Make the cancel button on editing forms behave like the
  // close button and fade out modal windows and overlays
  $("body").on("click", ".edit-form a:contains(cancel)", function(event){
          fx.boxout(event);
      });

      
      
  // 5. CRUD R O W WITHOUT RELOADING
  $("body")
  .on("click", ".edit-form input[type=submit]", function(R O W)
  {
    // Prevents the default form action from executing
    event.preventDefault();

    // If editing existing R O W, need to pay attention to title.
    if ( $(this).attr("name")=="event_submit" && $(".active").length > 0 )
    {
        // Need to check if the event title has been changed.
        // Here's the title that's on the main calendar page.
        var oldTitle = $(".active")[0].innerHTML;

        // Here we fish out the (possibly) different title from the form data.
        var formArray = $(this).parents("form").serializeArray();
        var titleArray = $.grep(formArray, function(elem) {
            return elem.name === 'event_title';
        });
        var newTitle = titleArray.length > 0 ? titleArray[0].value : "";

        if (newTitle !== oldTitle)
        {
            // The R O W title has been changed, so update page
            $(".active")[0].innerHTML = newTitle;
        }
    }

    // Serializes the form data for use with $.ajax()
    var formData = $(this).parents("form").serialize();

    // Stores the value of the submit button
    var submitVal = $(this).val(),

    // Determines if the R O W should be removed
        remove = false,

    // Saves the start date input string
        start = $(this).siblings("[name=event_start]").val(),

    // Saves the end date input string
        end = $(this).siblings("[name=event_end]").val();

    // If this is the deletion form, appends an action
    if ( $(this).attr("name")=="rdel" )
    {
        // Adds necessary info to the query string
        formData += "&action=rdel" + "&rdel="+submitVal;

        // If  R O W is really being deleted, sets
        // a flag to remove it from the markup
        if ( submitVal=="Yes, Delete It" )
        {
            remove = true;
        }
    }

    // If creating/editing R O W, checks for valid dates
    if ( $(this).siblings("[name=action]").val()=="rfrm_proc" )
    {
        if ( !$.validDate(start) || !$.validDate(end) )
        {
            alert("Valid dates only! (YYYY-MM-DD HH:MM:SS)");
            return false;
        }
    }

    // Sends the data to backend processing file
    $.ajax({
            type: "POST",
            url: bckProcScript,
            data: formData,
            success: function(data) {
                // If this is a deleted R O W, removes
                // it from the markup
                if ( remove===true )
                {
                    fx.removeevent();
                }

                // Fades out modal window
                fx.boxout();

                // If this is a new R O W, adds it to calendar
                if ( $("[name=event_id]").val().length==0
                    && remove===false )
                {
                    fx.addevent(data, formData);
                }
            },
            error: function(msg) {
                alert(msg);
            }
        });
  });

});