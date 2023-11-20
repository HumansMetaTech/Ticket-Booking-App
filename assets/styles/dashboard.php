<style>
    #main-content h3{
        padding-left: 1rem;
        margin-bottom: 0;
        text-transform: uppercase;
    }

    #status, #user, #admin{
        display: flex;
        flex-wrap: wrap;
    }

    .info-box{
        padding: 0.3rem 1rem;
        border-left: 4px solid;
        margin: 1rem;
        flex-basis: 45%;
        border-radius: 5px;
        box-shadow: 7px 7px 4px rgba(0, 0, 0, 0.25);
        background-color: #FFFFFF90;
    }

    .heading{
        display: flex;
        justify-content: space-between;
    }
    .heading h5{
        color: white;
        text-align: center;
        padding: 0.5rem 1rem;
        flex-basis: 70%;
        border-radius: 0px;
        margin: 0.5rem 0;
    }

    .info-box p{
        margin: 0;
    }

    .info-content{
        margin-bottom: 1rem;
    }

    .info-content .num{
        font-size: 1.5rem;
    }

    .info-box a{
        display: block;
        text-align: right;
        text-decoration: none;
        font-weight: bold;
    }
    /* START-hardcoding */
    #Booking{
        border-color: #448aff;
    }

    #Booking h5{
        background-color: #448aff;
    }
    #Booking a{
        color: #448aff;
    }

    #Bus {
        border-color: #1565c0;
    }

    #Bus h5{
        background-color: #1565c0;
    }

    #Bus a{
        color: #1565c0;
    }

    #Route{
        border-color: #009688;
    }

    #Route h5{
        background-color: #009688;
    }

    #Route a{
        color: #009688;
    }

    #Seat{
        border-color: #8bc34a;
    }

    #Seat h5{
        background-color: #8bc34a;
    }

    #Seat a{
        color: #8bc34a;
    }

    #Customer{
        border-color: #ffc107;
    }

    #Customer h5{
        background-color: #ffc107;
    }

    #Customer a{
        color: #ffc107;
    }

    #Admin{
        border-color: #ff9800;
    }

    #Admin h5{
        background-color: #ff9800;
    }

    #Admin a{
        color: #607d8b;
    }

    #Earning h5{
        background-color: #f44336;
    }

    #Earning {
        border-color: #f44336;
    }

    #Earning a{
        color: #f44336;
    }

    #Queries h5{
        background-color: #ad1457;
    }

    #Queries {
        border-color: #ad1457;
    }

    #Queries a{
        color: #ad1457;
    }

    /* END-hardcoding */


    #admin .info-box{
        text-align: center;
        padding: 1rem 0;
        border: none;
    }

    #admin h4{
        margin: 0.5rem 0;
    }

    #admin img{
        border-radius: 50%;
    }


    @media only screen and (min-width:1000px){
        #main-content{
            flex-grow: 1;
        }

        .info-box{
            flex-basis: 20%;
        }

        #admin .info-box{
            flex-basis: 15%;
        }
    }
</style>