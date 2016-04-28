function Simon(sel) {
    this.form = $(sel);
    this.state = "initial";
    this.current = 0;
    this.sequence = [];
    console.log('Simon started');
    this.sequence.push(Math.floor(Math.random() * 4));
    this.play();
    this.configureButton(0, "red");
    this.configureButton(1, "green");
    this.configureButton(2, "blue");
    this.configureButton(3, "yellow");

}

    //partly codes by dr.owen
    Simon.prototype.configureButton = function (ndx,color) {
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
        if(this.current < this.sequence.length) {
            // We have one to play
            var colors = ['red', 'green', 'blue', 'yellow'];
            document.getElementById(colors[that.sequence[that.current]]).play();
            var button = $(this.form.find("input").get(that.sequence[that.current]));
            button.css("background-color", colors[that.sequence[that.current]]);
            this.current++;
            
            window.setTimeout(function() {
                button.css("background-color", "lightgrey");
                that.playCurrent();
            }, 1000);
        }
        else {
            this.current = 0;
            this.state="enter";
        }
    }


    Simon.prototype.buttonOn = function(button) {
        var colors = ["red", "green", "blue", "yellow"];
        var that = this;
        for (var i = 0;i <4; i++) {
            if (button ==i) {
                this.form.find("input").get(i).css("background-color", colors[i]);
            }
            else {
                this.form.find("input").get(i).css("background-color", "lightgrey");
            }
        }
    };
//            var button = $(this.form.find("input").get(that.sequence[that.current]));
//button.css("background-color", colors[that.sequence[that.current]]);

    Simon.prototype.buttonPress = function(button, color) {
        var that = this;
        if( button == this.sequence[this.current] && this.state === "enter" ){
            if(this.current < this.sequence.length - 1) {
                this.current++;
            }
            else{
                this.sequence.push(Math.floor(Math.random() * 4));
                window.setTimeout(function() {
                    that.play();
                }, 1000);
            }
            //console.log("right");
        }
        else{
            document.getElementById("buzzer").play();
            this.sequence = [];
            this.sequence.push(Math.floor(Math.random() * 4));
            window.setTimeout(function() {
                that.play();
            }, 1000);
        }
    }

