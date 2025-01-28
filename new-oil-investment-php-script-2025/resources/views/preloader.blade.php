@include('alert-message')
            <style>





        /* Styles for the preloader */
        #preloader2 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
           
            z-index: 9991;
       
            justify-content: center;
            align-items: center;
            color: black
        }
</style>


 <script>
    $(document).ready(function() 
{
    $('#loader').hide();

    $('a').click(function() 
    {
        $('#loader').show();
    }) 
})
</script>
<script>
    $(document).ready(function() 
{
    $('#loader').hide();

    $('form').submit(function() 
    {
        $('#loader').show();
    }) 
})
</script>

   <script>
        document.onreadystatechange = function () {
            var state = document.readyState;
            if (state == "interactive") {
                // Show the preloader when the page starts loading
                showPreloader();
            } else if (state == "complete") {
                // Hide the preloader when the page finishes loading
                hidePreloader();
            }
        };

        function showPreloader() {
            document.getElementById("preloader2").style.display = "flex";
            document.getElementById("blurred-background").style.display = "block";
        }

        function hidePreloader() {
            document.getElementById("preloader2").style.display = "none";
            document.getElementById("blurred-background").style.display = "none";
        }

    </script>
    <title>
         Home
    </title>
    <script>
        document.onreadystatechange = function () {
            var state = document.readyState;
            if (state == "interactive") {
                // Show the preloader when the page starts loading
                showPreloader();
            } else if (state == "complete") {
                // Hide the preloader when the page finishes loading
                hidePreloader();
            }
        };

        function showPreloader() {
            document.getElementById("preloader2").style.display = "flex";
            document.getElementById("blurred-background").style.display = "block";
        }

        function hidePreloader() {
            document.getElementById("preloader2").style.display = "none";
            document.getElementById("blurred-background").style.display = "none";
        }

    </script>

 
</head>

<body class="main-layout m-0 p-0">
    <!-- loader  -->
    <div class="loader" id="preloader2" hidden>
        <i  class="fa-regular fa-loader fa-flip fa-10x"></i>
        <div class="loader"><img src="{{asset ('loader.gif')}}" alt="" style="height: 80; width: 80px;">
        </div>
    </div>
    <!-- end loader -->
    <!-- loader  -->
    <div >


        <div  class="loader2" id="preloader2" hidden>
 
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
     <center>   <div  hidden class="loader2"><img src="{{asset ('loader.gif')}}" alt="" style="height: 80; width: 80px;"></center>
        </div>
    </div>