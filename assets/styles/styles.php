<style>
    body, html{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
    scroll-behavior: smooth;
    }

    *, *::after, *::before{
        box-sizing: inherit;
    }
    .link-light{
        text-decoration: none;
    }

    .searchQuery{
        position: relative;
    }

    .sugg{
        position: absolute;
        width: 100%;
        z-index: 1;
        background-color: white;
        max-height: 179px;
        overflow: auto;
    }

    .sugg li{
        list-style-type: none;
        padding: 0;
        text-align: left;
        padding: 0.3rem;
        text-transform: capitalize;
        border-style: solid; 
        border-color: black;
        border-width: 0 2px 2px 2px;
        border-radius: 5px;
    }

    .sugg li:hover{
        background-color: #efefef;
        cursor: pointer;
    }


    .hl{
        background-color: #ddbea9;
    }


    #center_box{
        display: flex;
        content-align: center;
        justify-content: middle;
    }

    /* Overriding Bootstrap */

    nav a:hover{
        color: black;
    }
    nav{
        text-align: center;
        padding: 1.5rem 0;
    }

    nav div, nav ul{
        margin-top: 1rem;
    }

    nav div:first-child{
        margin-top: 0;
    }

    nav > div a{
        display: block;
    }

    nav ul{
        list-style-type: none;
        padding: 0;
        margin-bottom: 0;
    }

    nav a{
        padding-bottom: 0.2rem;
        text-decoration: none;
        color: black;
        font-weight: bold;
        text-transform: uppercase;
    }

    nav a:not(.nav-logo):hover{
        text-decoration: underline;
    }

    .nav-logo{
        color: #D65238;
        letter-spacing: 5px;
        transition: none;
    }

.admin {
 padding: 0.5rem 0.5rem;
 border-radius: 4px;
 border: 0;
 background-color: white;
 box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
 letter-spacing: 1.5px;
 text-transform: uppercase;
 font-size: 15px;
 transition: all .5s ease;
}

.admin:hover {
 letter-spacing: 3px;
 background-color: #ff0000;
 color: hsl(0, 0%, 100%);
 box-shadow: rgb(255 0 0) 0px 7px 29px 0px;
}

.admin:active {
 letter-spacing: 3px;
 background-color: #ff0000;
 color: hsl(0, 0%, 100%);
 box-shadow: rgb(255 0 0) 0px 0px 0px 0px;
 transform: translateY(10px);
 transition: 100ms;
}


    /* Alert Message on top of the header */
    .alert{
        z-index: 3;
        border-radius: 0px;
    }
    
    .btn-danger {
        color: #fff;
        background-color: #D7263D;
        border-color: #D81E5B;
    }

    .btn-primary {
        color: #fff;
        background-color: #0197F6;
        border-color: #C6D8D3;
    }

    #footercl{
        background-color: #E5CAA360;
    }

    #home{
        height: 70vh;
        background-image: url("assets/img/sample1.png");
        background-size: cover;
        background-position: 0% 65%;;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #nav{
        background-color: #E5CAA360;
        border-bottom-right-radius: 1rem;
        border-bottom-left-radius: 1rem;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        line-height: 3;
        backdrop-filter: blur(8px);
    }

    #route-search-form{
        width: 50%;
        padding: 1rem 0.5rem;
        color: black;
        position: relative;
        z-index: 1;
    }

    #route-search-form::before{
        content: "";
        position: absolute;
        top: 0%;
        left: 0%;
        height: 100%;
        width: 100%;
        background-color: #EAE2B760;
        backdrop-filter: blur(4px);
        z-index: -1;
        border-radius: 1rem; 
    }


    #route-search-form h1{
        margin-top: 0;
        text-align: center;
        color: black;
    }

    form{
        padding: 0 0.5rem;
        font-weight: bold;
    }

    #route-search-form > div{
        margin: 1rem 0;
    }

    form input, form textarea{
        border: 2px solid black;
        outline: none;
        width: 100%;
        font-size: inherit;
        border-radius: 5px;
        padding-left: 0.3rem;
    }


    #route-search-form form input{
        margin-top: 0.8rem;
    }


    #route-search-form form div:last-child{
        text-align: center;
    }

    form button{ 
        border:2px solid;
        padding: 0.3rem 0.7rem;
        font-weight: bolder;
        background-color: #ffffff80;
        transition: background-color 800ms, color 800ms;
        border-radius: 4px;
    }


    form button:hover{
        background-color: #fff;
        color: #201E22;
        cursor: pointer;
    }

    #info-num{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        backdrop-filter: blur(4px);
        background-color: #68C5DB30;
        border-radius: 1rem;
    }

    #info-num figure{
        flex-basis: 30%;
        padding: 2rem 0;
        text-align: center;
        border-radius: 5px;
    }

    #info-num figcaption{
        margin-top: 1rem;
        text-transform: uppercase;
    }

    #info-num .num{
        display: block;
        margin-bottom: 0.3rem;
        font-size: 1.2rem;
        font-weight: 800;
    }

    #pnr-enquiry{
        height: 80vh;
        background-image: url("assets/img/sample3.png");
        background-size: cover;
        background-position: 50% 50%;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        scroll-margin-top: 230px;
    }

    #pnr-form{
        padding: 4rem 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        position: relative;
        z-index: 1; 
    }

    #pnr-form form{
        width: 70%;
    }

    #pnr-form input{
        width: 100%;
    }

    #pnr-form::before{
        content: "";
        position: absolute;
        height: 100%;
        width: 100%;
        right: 0%;
        background-color: black;
        border-radius: 1rem;
        z-index: -1;
        opacity: 0.5;
    }

    #pnr-form div{
        margin: 1rem auto;
        width: 90%;
    }

    #pnr-form button{
        font-weight: bold;
        font-size: 14px;
        padding: 0.3rem 0.7rem;
        text-transform: uppercase;
        border: 3px solid;
        border-radius: 5px;
        color: #212529;
        background-color: #CCD3DD;
        transition: background-color 400ms;
    }

    #pnr-form button:hover{
        background-color: #ebecee;
        cursor: pointer;
    }

    #about{
        scroll-margin-top: 170px;
        text-align: center;
        padding: 3rem 0;
        background-color: #e5e5e5;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 1rem;
    }

    #about h1{
        margin: 0;
    }

    #about p{
        line-height: 26px;
    }

    #contact{
        scroll-margin-top: 20px;
        background-color: black;
        color: white;
        padding: 3rem 0;
    }

    #contact-form{
        width: 60%;
        margin: 0 auto;
    }
    #contact-form h1{
        margin-top: 0;
        text-align: center;
    }

    #contact-form label{
        display: block;
        margin-bottom: 1rem;
    }

    #contact-form div{
        margin-top: 1rem;
    }


    footer{
        padding: 1rem 0;
        text-align: center;
        font-weight: bold;
    }

    footer p{
        margin: 0;
    }

    .pnr-details{
        list-style-type: none;
        padding: 0;
    }

    .nav-scroll{
        position: fixed;
        background-color: #E5CAA3A0;
        border-radius: 1rem;
    }

    .modal-content{
        transform: translate(0, 30%);
    }

    .modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;  
}

.content {
    pointer-events: auto;
    background-clip: padding-box; 
    position: relative;
    display: flex;
    flex-direction: column;
    width: 330px;
    padding: 40px 30px;
    background: #dde1e7;
    border-radius: 10px;
    box-shadow: -3px -3px 7px #ffffff73,2px 2px 5px rgba(94,104,121,0.288);
    outline: 0;
}

.content .text {
  font-size: 33px;
  font-weight: 600;
  margin-bottom: 35px;
  color: #595959;
}

.field {
  height: 50px;
  width: 100%;
  display: flex;
  position: relative;
}

.field:nth-child(2) {
  margin-top: 20px;
}

.field .input {
  height: 100%;
  width: 100%;
  padding-left: 45px;
  outline: none;
  border: none;
  font-size: 18px;
  background: #dde1e7;
  color: #595959;
  border-radius: 25px;
  box-shadow: inset 2px 2px 5px #BABECC,
              inset -5px -5px 10px #ffffff73;
}

.field .input:focus {
  box-shadow: inset 1px 1px 2px #BABECC,
              inset -1px -1px 2px #ffffff73;
}

.field .span {
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 55px;
}

.field .label {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 45px;
  pointer-events: none;
  color: #666666;
}

.field .input:valid ~ label {
  opacity: 0;
}

.forgot-pass {
  text-align: left;
  margin: 10px 0 10px 5px;
}

.forgot-pass a {
  font-size: 16px;
  color: #666666;
  text-decoration: none;
}

.forgot-pass:hover a {
  text-decoration: underline;
}

.button {
  margin: 15px 0;
  width: 100%;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  font-weight: 600;
  background: #dde1e7;
  border-radius: 25px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #595959;
  box-shadow: 2px 2px 5px #BABECC,
             -5px -5px 10px #ffffff73;
}

.button:focus {
  color: #3498db;
  box-shadow: inset 2px 2px 5px #BABECC,
             inset -5px -5px 10px #ffffff73;
}

.sign-up {
  margin: 10px 0;
  color: #595959;
  font-size: 16px;
}

.sign-up a {
  color: #3498db;
  text-decoration: none;
}

.sign-up a:hover {
  text-decoration: underline;
}


.input {
  color: #000;
  font-size: 0.9rem;
  background-color: transparent;
  width: 100%;
  box-sizing: border-box;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
  border-bottom: var(--border-height) solid var(--border-before-color);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.input-border {
  position: absolute;
  background: var(--border-after-color);
  width: 0%;
  height: 2px;
  bottom: 0;
  left: 0;
  transition: width 0.3s cubic-bezier(0.6, -0.28, 0.735, 0.045);
}

.input:focus {
  outline: none;
}

.input:focus + .input-border {
  width: 100%;
}

.form-control {
  position: relative;
  padding: 0rem 0rem;
  border: 0px;
}

.input-alt {
  font-size: 1.2rem;
  padding-inline: 1em;
  padding-block: 0.8em;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.input-border-alt {
  height: 3px;
  background: linear-gradient(90deg, #FF6464 0%, #FFBF59 50%, #47C9FF 100%);
  transition: width 0.4s cubic-bezier(0.42, 0, 0.58, 1.00);
}

.input-alt:focus + .input-border-alt {
  width: 100%;
}

    /* Tablet */
    @media only screen and (min-width: 784px){
        

        header{
            position: absolute;
            display: block;
            top: 0;
            width: 100%;
            z-index: 2;
            transition: background-color 500ms;
        }
        nav{
            top: 28%;
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin: 0%;
            padding: 0%;
        }

        nav > div{
            display: flex;
            align-items: center;
            flex-grow: 1;
            justify-content: center;
        }

        nav ul{
            display: flex;
            flex-grow: 1;
            justify-content: center;
        }

        nav div, nav ul{
            margin-top: 0;
        }
        
        nav a{
            border-bottom: 2px solid transparent;
            margin: 0 1rem;
            transition: border-color 800ms;
            border-radius: 2px;
        }

        nav a:not(.nav-logo):hover{
            border-color: black;
            text-decoration: none;
        }

        #home{
            height: 100vh;
            background-position: 40% 65%;
            background-attachment: fixed;
            display: block;
        }

            
        #route-search-form{
            position: relative;
            top: 25%;
            width: 20rem;
            padding: 1rem 2rem;
                      
        }


        #route-search-form h1{
            margin-top: 0;
            text-align: center;
        }

        form{
            padding: 0 0.5rem;
            font-weight: bold;
        }

        #route-search-form form > div{
            margin: 1rem 0;
        }

        #block{
            width: 100%;
        }


    }


    /* Desktops */
    @media only screen and (min-width: 992px){
        /* Alert Message on top of the header */
        .alert{
            position: absolute;
            width: 100%;
            z-index: 3;
            border-radius: 0px;
        }

        .alert-dark{
            width: 50%;
            left: 50%;
            transform: translateX(-50%);
            border-radius:;
        }

        nav{
            width: 100%;
        }

        #home{
            background-position: 60% 65%;
        }


        #route-search-form{
            width: 60rem;
            padding: 2.5rem 2rem;
        }

        #block{
            width: 100%;
            margin: 0 auto;
        }

        #info-num figure{
            flex-basis: 15%;
        }

        #pnr-enquiry{
            height: 50vh;
        }

        #pnr-form{
            width: 50%;
            backdrop-filter: blur(4px);
        }

        #about{
            height: auto;
            padding: 2rem;
            border-radius: 1rem;
            
        }
        #about div{
            width:50%;
        }

        #contact-form{
            width: 438px;
            margin: 0 auto;
        }
    }
</style>