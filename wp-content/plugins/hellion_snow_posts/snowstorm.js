/*! Snowstorm v1.44.1 ~ Copyright (c) 2007-2013 Scott Schiller ~ MIT License */
snowStorm = {
    autoStart: true,
    flakesMaxActive: 96,
    useTwinkleEffect: true,
    start: function () {
        // Actual snowstorm effect code
        (function() {
            var snowMax = 90;
            var snowColor = ["#DDD", "#EEE"];
            var snowEntity = "&#x2022;";
            var snowSpeed = 0.95;
            var snowMinSize = 8;
            var snowMaxSize = 60;
            var snowflakes = [];
            var browserWidth;
            var browserHeight;
            function snow() {
                var snowflake = document.createElement("div");
                snowflake.innerHTML = snowEntity;
                snowflake.style.color = snowColor[Math.floor(Math.random() * snowColor.length)];
                snowflake.style.position = "absolute";
                snowflake.style.zIndex = "9999";
                var size = Math.floor(Math.random() * (snowMaxSize - snowMinSize + 1)) + snowMinSize;
                snowflake.style.fontSize = size + "px";
                snowflake.style.opacity = Math.random();
                snowflake.style.top = (Math.random() * browserHeight) + "px";
                snowflake.style.left = (Math.random() * browserWidth) + "px";
                document.body.appendChild(snowflake);
                snowflakes.push(snowflake);
                moveSnowflake(snowflake, size);
            }
            function moveSnowflake(snowflake, size) {
                var posY = parseFloat(snowflake.style.top);
                var posX = parseFloat(snowflake.style.left);
                function update() {
                    posY += snowSpeed;
                    if (posY > browserHeight) {
                        posY = -size;
                    }
                    snowflake.style.top = posY + "px";
                    snowflake.style.left = posX + "px";
                    requestAnimationFrame(update);
                }
                update();
            }
            function initSnow() {
                browserWidth = window.innerWidth;
                browserHeight = window.innerHeight;
                for (var i = 0; i < snowMax; i++) {
                    snow();
                }
            }
            window.addEventListener("resize", function() {
                browserWidth = window.innerWidth;
                browserHeight = window.innerHeight;
            });
            window.addEventListener("load", initSnow);
        })();
    }
};

snowStorm.start();
