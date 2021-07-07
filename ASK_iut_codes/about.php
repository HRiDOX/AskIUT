<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
            font-size: 17px;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 50%;
            min-height: 50%;
        }

        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }
    </style>
</head>

<body>

    <video autoplay muted loop id="myVideo">
        <source src="Video/IUT.mp4" type="video/mp4">

    </video>

    <div class="content">
        <h1>AskIUT</h1>
        <p>Starting in a new institution is very overwhelming for every new student. Students often lag behind just
            because they do not know how to ask for suggestions and what they exactly need. It becomes very
            beneficial for students if they can get proper guidance from batchmates, seniors or even the alumni.
            Through this website, students can ask for suggestions as a post where other users can give their
            suggestions. They can also share various resources, source of the resource and related links or videos.
            Although there are various social medias, there are some people who do not actively use it, they can use
            this platform easily and it would be easier for them to use. It would have a forum like structure with
            slightly more features.
        </p>
        <button id="myBtn" onclick="myFunction()">Pause</button>
    </div>

    <script>
        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");

        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }
    </script>

</body>

</html>