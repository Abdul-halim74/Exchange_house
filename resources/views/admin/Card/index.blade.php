<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/c8ee3dd930.js"></script>
<style>
    body {
	 font-family: 'Roboto', sans-serif;
	 background: #f0f5f9;
}
 .card {
	 position: relative;
	 margin: 150px auto;
	 width: 450px;
	 padding: 20px;
	 box-shadow: 3px 10px 20px rgba(0, 0, 0, 0.2);
	 border-radius: 3px;
	 border: 0;
}
 .card .circle {
	 border-radius: 3px;
	 width: 150px;
	 height: 150px;
	 background: red;
	 position: absolute;
	 right: 0px;
	 top: 0;
	 background-image: linear-gradient(to top, #eb0832 0%,, #d30b0b 100%);
	 border-bottom-left-radius: 170px;
}
 .card .content {
	 margin-top: 25px;
	 display: flex;
	 flex-direction: column;
}
 .card h1 {
	 font-size: 34px;
	 font-weight: bold;
	 margin-bottom: 0;
}
 .card h2 {
	 font-size: 18px;
	 letter-spacing: 0.5px;
	 font-weight: 300;
}
 .card .social {
	 margin-bottom: 5px;
}
 .card .social a {
	 text-decoration: none !important;
	 color: black;
	 margin-left: 8px;
	 font-weight: 300;
}
 .card .social a i {
	 font-weight: 400;
}
 .card .location {
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 flex-direction: column;
}
 .card .location i {
	 color: red;
}
 .card .location p {
	 font-weight: 300;
}
 

</style>
<div class="container">
    <div class="card">
        <div class="title">
            <h1>Umur Köse</h1>
            <h2>"Frontend Developer"</h2>
        </div>
        <div class="content">
            <div class="social">
                <i class="fab fa-codepen"></i>
                <a href="https://codepen.io/umurkose/" target="_blank">
                    codepen.io/umurkose</a>
            </div>

            <div class="social">
                <i class="fab fa-linkedin"></i>
                <a href="https://www.linkedin.com/in/bada55-umurkose" target="_blank">
                    linkedin.com/in/umurkose</a>
            </div>

            <div class="social">
                <i class="fas fa-globe-europe"></i>
                <a href="https://umurkose.com" target="_blank">
                    umurkose.com</a>
            </div>
        </div>
        <div class="circle"></div>
    </div>
</div>
