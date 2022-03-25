


$(function() {
    
    


    // ===== REMOVE ACTIVE TABLE ROW =====
    setInterval(() => {
        $("tr.new_data").removeClass("new_data");
    }, 10000);
    // ===== END REMOVE ACTIVE TABLE ROW =====



    function validateInput(element = '') {
        if (element) {

        }
    } 


    function validateForm() {

    }


    // ========== EVENTS ==========

    $(document).on("keypress", ".validate", function(e) {
        // ----- KEYCODE -----
		/**
		 *   - [A-Z]    = 65-90
		 *   - [a-z]    = 97-122
		 *   - [0-9]    = 48-57
		 *   - [()]     = 40-41
		 */
		// ----- END KEYCODE -----

		let keyCode = e.keyCode;
		let key     = e.key;
		let flag    = 0;

		let allowCharacters = $(this).data("allowcharacters");
		if (allowCharacters) {
			allowCharacters =
				$(this).data("allowcharacters").length > 2
					? $(this).data("allowcharacters").split("")
					: "[ ][ ]";
			allowCharacters.shift();
			allowCharacters.pop();
			allowCharacters = allowCharacters.join("");
			let arrCharacters = allowCharacters.split(/\]\[/);

			arrCharacters.map((item) => {
				item == "0-9" && keyCode >= 48 && keyCode <= 57  && flag++;
				item == "A-Z" && keyCode >= 65 && keyCode <= 90  && flag++;
				item == "a-z" && keyCode >= 97 && keyCode <= 122 && flag++;
				item == "()"  && keyCode >= 40 && keyCode <= 41  && flag++;
				item == "''"  && keyCode == 34 && flag++;
				item == key && flag++;
			});

			if ($(this)[0].nodeName == "TEXTAREA") {
				keyCode == "13" && flag++; // ALLOWED ENTER
			}

			return flag > 0 ? true : false;
		}
    })

    function handlePaste(element = '') {
        let value = element.value;
        let newValue = '';
    
        let allowCharacters = $(element).data("allowcharacters");
		if (allowCharacters) {
			allowCharacters =
				$(element).data("allowcharacters").length > 2
					? $(element).data("allowcharacters").split("")
					: "[ ][ ]";
			allowCharacters.shift();
			allowCharacters.pop();
			allowCharacters = allowCharacters.join("");
			let arrCharacters = allowCharacters.split(/\]\[/);

            let arrValue = value.split("");
            arrValue.map(x => {
                let keyCode = x.charCodeAt(0);
                console.log(keyCode);
                let flag = 0;
                arrCharacters.map((item) => {
                    item == "0-9" && keyCode >= 48 && keyCode <= 57  && flag++;
                    item == "A-Z" && keyCode >= 65 && keyCode <= 90  && flag++;
                    item == "a-z" && keyCode >= 97 && keyCode <= 122 && flag++;
                    item == "()"  && keyCode >= 40 && keyCode <= 41  && flag++;
                    item == "''"  && keyCode == 34 && flag++;
                    item == keyCode && flag++;
                });

                newValue += (flag ? x : '');
            })
		}
        $(element).val(newValue);
    }

    $(document).on("keyup", ".validate", function(e) {
        let isPaste = $(this).attr("paste") == "true";
        let value   = this.value;

        if (isPaste) {
            handlePaste(this);
            $(this).removeAttr("paste");
        }
    })

    $(document).on("paste", ".validate", function(e) {
        // $(this).attr("paste", "true");

        // let oldValue = this.value;
        // // let id = this.id;
        // console.log(id);
        // let newValue = $(`#${id}`).val();
        // console.log(oldValue, newValue);
        // // e.preventDefault();
        // let allowCharacters = $(this).data("allowcharacters");
        // if (allowCharacters) {
        //     allowCharacters =
		// 		$(this).data("allowcharacters").length > 2
		// 			? $(this).data("allowcharacters").split("")
		// 			: "[ ][ ]";
		// 	allowCharacters.shift();
		// 	allowCharacters.pop();
		// 	allowCharacters = allowCharacters.join("");
		// 	let arrCharacters = allowCharacters.split(/\]\[/);
        //     console.log(arrCharacters);
        // }
    })

    // ========== END EVENTS ==========

})