window.onload = function () {
    let canvas = document.querySelector('canvas');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let c = canvas.getContext('2d');

    let mouse = {
        x: undefined,
        y: undefined
    }

    let maxRadius = 55;
    let minRadius = 2;
    let growRadius = 99;
    

    window.addEventListener("mousemove",
        function (event) {
            mouse.x = event.x;
            mouse.y = event.y;

        })
        window.addEventListener("resize", function() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

        })



    //? VYTVOŘENÍ OBJEKTTU V JS ---> POZNÁME TAK, ŽE MÁ PRVNÍ PÍSMENO VELKÉ
    function Circle(x, y, velx, vely, radius, r, g, b) {
        this.x = x;
        this.y = y;
        this.velx = velx;
        this.vely = vely;
        this.radius = Math.random() *3 +1;
        this.minRadius  = radius;
        this.r = r;
        this.g = g;
        this.b = b;

        this.draw = function () {
            c.beginPath();
            c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
            c.strokeStyle = "rgb(" + r + "," + g + "," + b + ")";
            c.stroke();

        }
        this.update = function () {

            if (this.x + this.radius > innerWidth || this.x - this.radius < 0) {
                this.velx = -this.velx;
            }

            if (this.y + this.r > innerHeight || this.y - this.radius < 0) {
                this.vely = -this.vely;

            }

            this.x += this.velx;
            this.y += this.vely;

            //? Interaktivita
            if (mouse.x - this.x < growRadius && mouse.x - this.x > -growRadius && mouse.y - this.y < growRadius && mouse.y - this.y > -growRadius) {
                if (this.radius < maxRadius) {
                    this.radius += 1;
                }
            } else if (this.radius > minRadius) {
                this.radius -= 1;
            }



            this.draw();
        }

    }
    let circleArray = [];

    for (let i = 0; i < 500; i++) {
        let r = Math.round(Math.random() * 255);
        let g = Math.round(Math.random() * 255);
        let b = Math.round(Math.random() * 255);
        let radius = 22;
        let x = Math.random() * (innerWidth - radius * 2) + radius;
        let y = Math.random() * (innerHeight - radius * 2) + radius;
        let velx = (Math.random() - 0.5) * Math.random() * 10;
        let vely = (Math.random() - 0.5) * Math.random() * 10;
        
        

        circleArray.push(new Circle(x, y, velx, vely, radius, r, g, b));

    }
    console.log(circleArray);


    function animate() {
        requestAnimationFrame(animate);
        c.clearRect(0, 0, innerWidth, innerHeight);
        for (let i = 0; i < circleArray.length; i++) {
            circleArray[i].update();

        }

    }
    animate();
}