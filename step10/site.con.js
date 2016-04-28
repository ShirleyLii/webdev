/*! DO NOT EDIT step10 2016-04-22 */
function Buttons() {
    this.on = 1;
    var that = this;

    this.update(1);

    for(var b=1;  b<=3;  b++) {
        this.configButton(b);
    }
}

Buttons.prototype.configButton = function(b) {
    var c = (b == 3 ? 1 : b + 1);
    var that = this;

    $("#b" + b).click(function() {
        if(that.on == b) {
            that.update(c);
        }
    });
}

Buttons.prototype.update = function(a) {
    this.on = a;
    $("#b1").css("background-color", this.on == 1 ? "red" : "green");
    $("#b2").css("background-color", this.on == 2 ? "red" : "green");
    $("#b3").css("background-color", this.on == 3 ? "red" : "green");
    $("#b1").html(this.on == 1 ? "Press Me" : "&nbsp;");
    $("#b2").html(this.on == 2 ? "Press Me" : "&nbsp;");
    $("#b3").html(this.on == 3 ? "Press Me" : "&nbsp;");
}
function Simon(sel) {

    this.form = $(sel);
    this.state = "initial";
    this.current = 0;
    this.sequence = [];
    this.sequence.push(Math.floor(Math.random() * 4));
    this.configureButton(0, "red");
    this.configureButton(1, "green");
    this.configureButton(2, "blue");
    this.configureButton(3, "yellow");
    this.play();
    console.log('Simon started');

    //partly codes by dr.owen
    Simon.prototype.configureButtonn = function (ndx,color) {
        var button = $(this.form.find("input").get(ndx));
        var that = this;

        button.click(function(event) {
            that.buttonPress(ndx,color);
        });

        button.mousedown(function(event) {
            button.css("background-color", color);
        });

        button.mouseup(function(event) {
            button.css("background-color", "lightgrey");
        });
    }

    Simon.prototype.play = function () {
        this.state = "play";    // State is now playing
        this.current = 0;       // Starting with the first one
        this.playCurrent();
    }

    Simon.prototype.playCurrent = function () {
        var that = this;
        if (this.current < this.sequence.length) {
            // We have one to play
            var colors = ['red', 'green', 'blue', 'yellow'];
          //  this.buttonOn(this.sequence[this.current]);
            var button = $(this.form.find("input").get(this.sequence[this.current]));
            button.css("background-color" , colors[this.sequence[this.current]]);
            document.getElementById(colors[this.sequence[this.current]]).play();
            this.current++;

            window.setTimeout(function () {
                this.playCurrent();
            }, 1000);
        } else {
            this.state = "enter";
            this.buttonOn(-1);
        }
    }


    Simon.prototype.buttonOn = function(button) {
        var colors = ["red", "green", "blue", "yellow"];
        var that = this;
        for (var i = 0;i <4; ndx++) {
            if (button ==i) {
                this.form.find("input").get(i).css("background-color", colors[i]);
            }
            else {
                this.form.find("input").get(i).css("background-color", "lightgrey");
            }
        }
    };


    Simon.prototype.buttonPress = function(button, color) {
        console.log("Button press: " + button);


    }

}