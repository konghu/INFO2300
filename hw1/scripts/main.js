/**

	INFO/CS 2300 Spring 2017 - Homework 1
	Created By: Batya Zamansky and Brandon Giraldo

	This is main.js, the file (and only file) you will edit to test your work.

	This file has 5 problems, each outlined in a comment. You must write your solutions
	between //START CODE QX and //END CODE QX for each question.

	The first code in this file is an ajax call to a local resource, pokemon.json. You will need to use
	this again for questions 4 and 5. Feel free to reuse --- START * --- to --- END * --- when
	building your solutions for those questions.

	Do not edit data/pokemon.json or pokemon.js. Again, this is the only file you will need to edit.

	You can (and are encouraged to) use console.log() to debug your work as you work along. Also check
	the DOM using the inspector to know exactly where your html result is going to be outputted to. Use
	jQuery as necessary. (exception in question 2 with show/hide functions)

	Though there are not any PHP files in this assignment, you must run it on a
	server (local on your computer or on the course server) since there is an
	ajax call to a resource. Most browsers will throw
	an error if you try to load data from an external source while not running on a server.
	You can read more about that here:

	https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS

	Have fun!

**/

window.onload = function() {
	// --- START OF AJAX CALL ---

	// ajax call to pokemon.json
	var request = $.ajax({
		type: 'GET',
		url: "data/pokemon.json",
		dataType: "json"
	});

	// When the call is complete, we have access to the data
	request.done(function(data) {
		// This is your array of pokemon, the data was converted into an object array
		var pokemonArray = $.map(data, function(value, index) {
			return [value];

		});
		// show the array of pokemon objects


		// Loop over the objects in the array
		pokemonArray.forEach(function(item) {
			// making a new instance of the Pokemon object while looping over the pokemon objects from
			// the array. Be sure to look at the properties of each object in the console.
			var pokemon = new Pokemon(item.name, item.weight, item.sprites, item.stats, item.types, "full");
			// jquery to append the html to the .row class, need to call render on pokemon object to get html
			$(".results .row").append(pokemon.render);
		});
	});

	// --- END OF AJAX CALL ---

	/**
		Question 1 - Changing font-size
		10 points

		Change the font size of the pokemon weight and pokemon item elements
		based on the selected value of #font-select

		target the .item and .weight classes
	**/
	$("#font-select").change(function() {
		// START CODE Q1
        $('.weight , .item').css('font-size',this.value + 'px');

		// END CODE Q1

	});

	/**
		Question 2 - Show/Hide
		10 points

		Show/hide the all sprite images when the box is checked/unchecked.

		Do not use jQuery show / hide functions, cell text formatting needs to be retained.

		In other words, the sprites should not be 'visible'.
	**/
	$("#hide-sprites").change(function() {
		// START CODE Q2

        if ( $('img').css('visibility') === 'visible' ) {
            $('img').css('visibility', 'hidden');
            // element is hidden
        }
        else $('img').css('visibility', 'visible');




        // END CODE Q2

	});

	/**
		Question 3 - Adding a font-size
		15 points

		Add a font size to the select menu if the input is a number.
		You must check that it is a number.
		Look at the DOM to make sure you append the value to the right drop down menu.
		Also validate that it is between 5 - 22, otherwise ignore it completely

		Clear the add-font text field once the accepted number has been appended to
		the right drop down menu

		It is OK if the resulting selections do not display in order
	**/
	$("#add-font-size").click(function(){
		// START CODE Q3

        var $size  = $('#fontSizeInput').val();
        if($size <= 5) {
            $('#fontSizeInput').val("That font size is too small!");
            return;
        }
        if($size >= 22) {
            $('#fontSizeInput').val("That font size is too big!");
            return;
        }

        $('#font-select').append('<option value="' + $size + '">' + $size + ' pixels' + '</option>');
        $('#fontSizeInput').val("");

		// END CODE Q3

	});

	/**
		Question 4 - Search
		25 points

		Filter by pokemon name. You will need to make an ajax call to pokemon.json
		You need to check the inputed value from search field against the name of
		each pokemon from the returned ajax call.

		The search should be case insensitive. Searching for "Wa" or "wa" should display Wartortle.

		When search is cleared, show all pokemon as would appear on first load

		Be sure to clear existing entries from the display before appending new items to the DOM

		Look at --- START * --- to --- END * ---
	**/
	$(".search").keyup(function() {
        $(".results .row div").remove();
        // START CODE Q4
        var $searchInput = $("#inlineFormInputGroup").val();
        request = $.ajax({
            url: "data/pokemon.json",
            type: "get",
            dataType: "json"
        });

		request.fail(function(){
			console.log("failure")
		});

        request.done(function (data) {

			var resultArray = $.map(data, function(value, index) {
					return[value];
			});

                resultArray.forEach(function(item) {
                    if (item.name .indexOf($searchInput) !== -1 ){
                    // making a new instance of the Pokemon object while looping over the pokemon objects from
                    // the array. Be sure to look at the properties of each object in the console.
                    var pokemon = new Pokemon(item.name, item.weight, item.sprites, item.stats, item.types, "full");
                    // jquery to append the html to the .row class, need to call render on pokemon object to get html
                    $(".results .row").append(pokemon.render);}
                });
        });

		// END CODE Q4

	});

	/**
		Question 5 - Sort by
		40 points (10 points for each sort)

		For name, alphabetical
		For Weight, largest first
		For Stats, largest sum of all stats first
		For Types, most types first

		You will need to make an ajax call to pokemon.json
		You need to check the inputed value from the DOM
		against a field (or newly computed field) of the pokemon from the returned call

		Be sure to clear existing entries from the display before appending new items to the DOM

		You should use either a series of if else statements or case statements to handle
		either of the 4 types of sorting. If the default option is selected, dont to anything.

		This resource may be helpful in organizing the data
		https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/sort
	**/
	$("#sort-select").change(function() {
		// START CODE Q5

        $(".results .row div").remove();
        // START CODE Q4
        var $sortCategory = $("#sort-select").val();
        request = $.ajax({
            url: "data/pokemon.json",
            type: "get",
            dataType: "json"
        });

        request.fail(function(){
            console.log("failure")
        });

        request.done(function (data) {

            var resultArray = $.map(data, function(value, index) {
                return[value];
            });

            if ($sortCategory === "name") {

                resultArray.sort(function (a, b) {
                    var nameA = a.name.toLowerCase();
                    var nameB = b.name.toLowerCase();
                    if (nameA < nameB) //sort string ascending
                        return -1;
                    if (nameA > nameB)
                        return 1;
                    return 0; //default return value (no sorting)
                })
            }

			else if ($sortCategory === "weight"){
            	resultArray.sort(function(a, b){
                    return b.weight-a.weight;
                })
			}

            else if ($sortCategory === "statistics"){

                   resultArray.sort(function(a, b){
                   	var statsA = a.stats[0].base_stat + a.stats[1].base_stat + a.stats[2].base_stat + a.stats[3].base_stat + a.stats[4].base_stat + a.stats[5].base_stat;
                    var statsB = b.stats[0].base_stat + b.stats[1].base_stat + b.stats[2].base_stat + b.stats[3].base_stat + b.stats[4].base_stat + b.stats[5].base_stat;

                    return statsB - statsA;
					});
            }

            else if ($sortCategory === "types"){
                resultArray.sort(function(a, b) {
					var typesA = a.types.length;
					var typesB = b.types.length;
					return typesB - typesA;
                });

			}

                resultArray.forEach(function (item) {
                    // making a new instance of the Pokemon object while looping over the pokemon objects from
                    // the array. Be sure to look at the properties of each object in the console.
                    var pokemon = new Pokemon(item.name, item.weight, item.sprites, item.stats, item.types, "full");
                    // jquery to append the html to the .row class, need to call render on pokemon object to get html
                    $(".results .row").append(pokemon.render)
                });
            });
        });



		// END CODE Q5

		// Remember to upload this file to your server account and upload ready.js to CMS
		// to indicate you are ready for grading

// 	});
//
};