<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Icrm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
            font-family: 'lato';
        }
       
    footer {
        position: fixed;
        bottom: 0;
    }
    .bg-darkred {
        background-color: darkred;
    }
    .about{
        font-size: 50px !important;
        text-shadow: 2px 3px 4px grey;
        font-weight: bolder !important;
    }
    #about-1{
        margin: 30px;
        padding: 5px;
       
    }
    #about-1 h1{
        text-align: center;
        color: white;
        font-weight: bold;
    }
    #about-1 p{
        text-align: center;
        padding: 3px;
        color: white;
    }
    .about-item i{
        font-size: 43px;
        margin: 0;
    }
    .about-item h3{
        font-size: 25px;
        margin-bottom: 10px;

    }
    .about-item hr{
        width: 46px;
        height: 3px;
        background-color: black;
        margin: 0 auto;
        border: none;
    }
.about-item p{
    margin-top: 20px;
}
.about-item:hover{
 transform: translate(-3px,-3px);
}
.about-item{
        background: linear-gradient(360deg,rgb(23, 73, 180),transparent);
        box-shadow: 3px 3px 9px black;
         margin-bottom: 20px;
        margin-top: 20px;
        background-color: white;
        padding: 80px , 30px;
        box-shadow: 2px 4px 14px black;
        transition:all 2s;
}
.about-item:hover{
       background: linear-gradient(360deg,rgb(4, 51, 151),transparent);
}

.about-1:hover hr{
    background-color: #fff;
}
#about-2 p{
    padding: 10px;
}
#about-2 h3{
   padding-top: 15px;
}
.instructor,.about{
    background: linear-gradient(rgb(249, 255, 255),rgb(253, 250, 250));
}
.y-p{
    font-size: 60px;
    font-family: Apple Chancery, cursive;
}
/* sign-up here button*/ 
.sign-up{
position:relative;
text-decoration:none;
  font-size:2rem;
  font-family:sans-serif;
  font-weight:bold;
  color:black;
  border:1px solid purple;
  padding:40px 80px; 
  background-color: purple !important;
  transition:all 0.5s; 
  overflow:hidden;
}

.sign-up:hover{
    transform: scale(1.3);
    box-shadow: 5px 5px 10px grey !important;
}

/*clip path*/ 
.mission{
    color: black !important;
  
}
i{
     color: rgb(66, 8, 100);
}
.clip {
  clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);
   background: linear-gradient(360deg,rgb(148, 130, 212),transparent);
padding-bottom: 150px;
padding-top: 50px;

}
.y-p{
text-shadow: 4px 5px 8px grey;
}

.card-round{
    border-radius: 11px;
    box-shadow: 5px 5px 9px grey !important;
    transition: all 0.8s;
}

.card-round:hover{
 box-shadow: 15px 15px 25px grey !important;
}

/* aboutus*/ 

.heading {
     color: rgb(66, 8, 100) !important;
    text-shadow: 3px 4px 5px grey;
}


.frequently{
    font-size: 40px;
    font-weight: 900;
    box-shadow: 5px 7px 16px grey;
    padding-top: 10px;
    padding-bottom: 10px;
      background: linear-gradient(280deg,rgb(7, 92, 248),rgb(160, 13, 160));
}


.frequently-1{
    background-color: whitesmoke;
}
.frequently-1:hover{
    background-color:  rgba(226, 220, 220, 0.945);
}
.about{
    color: blue;
}
#instructors{
     background: linear-gradient(360deg,rgb(148, 130, 212),transparent);
}
.amplifying{
    color: purple;
}
.full-stack{
    color: text-white !important;
     background: linear-gradient(280deg,rgb(7, 92, 248),rgb(160, 13, 160));
}

</style>

</head>

<body>
    <?php
    include_once 'header.php';
    ?>
                 <section class="mt-5" >
                <div class="container ">
                    <div class="d-sm-flex align-items-center   justify-content-between">
                         <div class="mt-5">
                        <h1 class="" ><span class="text-dark fw-bolder y-p">Powering Connections<br></span> <span class=" amplifying fw-bolder y-p">Amplifying Success</span></h1>
                        <p class="lead mt-3 mb-5 pt-3 ">Fuel your ISP's success with our CRM web app - the ultimate tool to streamline operations, enhance customer interactions, and drive business growth. Harness the power of data-driven insights to deliver exceptional service and cultivate long-lasting customer relationships that propel your business forward.</p>
                        <a href="./Customer/signUp.html" class=" border-5 p-3 px-2 text-decoration-none fs-5 sign-up rounded-3 w-50 text-center bg-dark text-white" ><b>SIGNUP HERE</b></a>
                        </div>
                        <img src="./imgs/icrm.png" class="img-fluid  header_img w-50 d-none d-sm-block"  >
                    </div>
                </div>
                 </section>

        

   
    <section class="clip " >
        <div id="about-2" class="mt-5">
            <div class="content-box-lg ">
                <div class=" container jumbotron  ">
                  <div class="row pb-3 ">
                   <div class="col-md-12 col-lg-4">
                        <div class="about-item text-center  p-3 rounded-5">
                            <i class="fa fa-book fw-bold mb-1"></i>
                            <h3 class="fs-2 m-4 fw-bolder mission  text-white ">MISSION</h3>
                            <hr>
                            <h4 class="fs-5 text-white mx-4 my-4" >To revolutionize ISP customer experiences by providing an innovative CRM solution that empowers businesses to forge lasting connections, enhance service delivery, and drive sustainable growth.</h4>
                        </div>
                    </div>

                   <div class="col-md-12 col-lg-4">
                         <div class="about-item text-center  p-3 ">
                            <i class="fa fa-globe fw-bold mb-1"></i>
                            <h3 class="fs-2 m-4 fw-bold mission  text-white ">FAST</h3>
                            <hr>
                            <h4 class=" fs-5 text-white mx-4 my-4" >Accelerate your ISP operations with our lightning-fast CRM solution. From swift customer interactions to rapid data retrieval, we optimize efficiency, empowering you to stay ahead in a fast-paced industry.</h4>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="about-item text-center  p-3 ">
                            <i class="fa fa-lock fw-bold mb-1"></i>
                            <h3 class="fs-2 m-4 fw-bold mission  text-white ">SECURE</h3>
                            <hr>
                            <h4 class="fs-5 mx-4 text-white my-4" >Trust in our secure CRM solution designed specifically for ISPs. Safeguard customer data, protect privacy, and maintain compliance, ensuring the highest level of security for your business and customers.</h4>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
</section>  


            <section>
                <div class="container ">
                <div id="about-1">
                    <h1 class="text-dark  p-4 fw-bold about ">ABOUT US</h1>
                    <h4 class=" text-center  pb-5 pt-2 text-muted ">Welcome to our CRM platform designed specifically for Internet Service Providers (ISPs). At iCRM System, we understand the unique challenges faced by ISPs in managing customer relationships effectively. Our CRM solution empowers ISPs to streamline operations, enhance customer experiences, and boost overall efficiency.
                    With our tailored features, ISPs can easily manage customer data, track service subscriptions, and monitor billing information, all within one intuitive interface. Our CRM system enables ISPs to handle service inquiries promptly, providing personalized support and improving customer satisfaction.
                    Built on robust technology, our platform ensures seamless integration with existing ISP infrastructures, reducing implementation time and costs. Our CRM analytics and reporting tools offer valuable insights into customer behavior, enabling ISPs to identify opportunities for growth and optimize their service offerings.
                    At [Company Name], we are committed to delivering a comprehensive CRM solution that fosters long-term customer loyalty and accelerates ISP success. Join us today and experience the power of efficient customer relationship management in the ISP industry.</h4>
                </div>
                </div>
            </section>

    <section id="faqs" class="p-5 shadow-lg">
        <div class="container shadow-lg p-5 border-0  ">
            <h2 class="text-center text-white frequently mb-4">Frequently Asked Questions</h2>
          <div class="accordion accordion-flush " id="questions">

        <!--item-1-->
              <div class="accordion-item ">
               <h2 class="accordion-header ">
                <button type="button" class="accordion-button collapsed frequently-1" data-bs-toggle="collapse"  data-bs-target="#question-one" ><h5 class="fw-bold">What is the role of CRM in an ISP (Internet Service Provider) business?</h5>
                </button>
                </h2>
              <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">

              <div class="accordion-body">
                   CRM (Customer Relationship Management) plays a crucial role in an ISP business by helping to manage customer interactions, improve customer satisfaction, and streamline internal processes. It enables ISPs to track customer information, handle service requests and inquiries, manage billing and payments, and analyze customer data to enhance marketing and sales efforts.
              </div>
          </div>
        </div>
           <!--item-2-->
           <div class="accordion-item ">
               <h2 class="accordion-header ">
                <button type="button" class="accordion-button collapsed frequently-1" data-bs-toggle="collapse"  data-bs-target="#question-two"><h5 class="fw-bold ">How can CRM help an ISP in managing customer support?</h5></button>
                </h2>
              <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">

              <div class="accordion-body">
                   CRM systems provide ISPs with a centralized platform to handle customer support tickets and inquiries. It allows support agents to log and track customer issues, assign priorities, and manage resolutions efficiently. CRM systems often include features like ticket routing, automated responses, and knowledge bases to ensure consistent and timely support, leading to improved customer satisfaction.
              </div>
          </div>
        </div>
         <!--item-3-->
         <div class="accordion-item">
               <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed frequently-1" data-bs-toggle="collapse"  data-bs-target="#question-three"><h5 class="fw-bold" >What are the benefits of using CRM for sales and marketing in an ISP?</h5></button>
                </h2>
              <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">

              <div class="accordion-body">
                   CRM empowers ISPs in sales and marketing activities by providing a comprehensive view of customer data. It allows ISPs to segment customers based on demographics, preferences, and buying behavior, enabling targeted marketing campaigns. CRM systems also track leads, opportunities, and customer interactions, facilitating effective sales management and forecasting. Furthermore, CRM helps in managing marketing campaigns, tracking their effectiveness, and measuring return on investment.
              </div>
          </div>
        </div>
        <!--item-4-->
        <div class="accordion-item">
               <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed frequently-1" data-bs-toggle="collapse"  data-bs-target="#question-four"><h5 class="fw-bold">How does CRM contribute to improving customer satisfaction in an ISP business?</h5></button>
                </h2>
              <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">

              <div class="accordion-body">
                   CRM plays a vital role in enhancing customer satisfaction within an ISP business. By consolidating customer data, CRM enables ISPs to have a 360-degree view of customers' interactions, preferences, and history. This comprehensive understanding helps ISPs provide personalized and proactive customer service. CRM also facilitates efficient handling of service requests, timely issue resolution, and effective communication, which ultimately leads to improved customer satisfaction and loyalty.
              </div>
          </div>
        </div>
        <!--item-5-->
        <div class="accordion-item ">
               <h2 class="accordion-header">
                <button type="button" class="accordion-button collapsed frequently-1" data-bs-toggle="collapse"  data-bs-target="#question-five"><h5 class="fw-bold">How does CRM ensure the security and privacy of customer data in an ISP business?</h5></button>
                </h2>
              <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">

              <div class="accordion-body">
                   CRM systems prioritize the security and privacy of customer data in an ISP business through measures such as data encryption during transit and storage, robust access controls to restrict unauthorized access, regular data backups and recovery processes, compliance with data protection regulations, regular security updates and patches, and employee training on data security best practices. By implementing these measures, CRM systems ensure the confidentiality, integrity, and availability of customer data, fostering trust with customers and maintaining a secure environment for their information.
              </div>
          </div>
        </div>
    </div>
 </div>
    </section>
  

        <section id="instructors" class="p-5 ">
            <div class="container ">
                <h2 class="text-center card-title  text-dark fs-1 mb-4 fw-bold mb-5 y-p">
               Project Team
                </h2>
                <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card card-round bg-light shadow-lg border-0">
                        <div class="card-body  shadow-lg instructor_person text-center">
                            <img src="./imgs/teacher2.jpg" class=" mb-3 img-fluid rounded-5 p-2 " style="width: 300px;" height="250px" alt="">
                            <div class="text-center " >
                                 <h4 class="card-title bg-primary text-white p-2 rounded-4 mb-3 fw-bolder img-fluid fw-bold ">Dr. Pawan Thakur</h4>
                                 <h4  class="text-center fw-bolder fs-3 text-muted mb-3" >Co-Guide</h4>
                                 <h6 class="text-center text-primary mb-4" >
                                    <span class="fa fa-envelope me-2" ></span>
                                    pawansarkaghat@gmail.com
                                 </h6>
                                 <h5 class="text-center fw-bolder full-stack text-white rounded-pill p-2 fs-3" >Assistent professor</h5>
                            
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="col-md-6 col-lg-3">
                    <div class="card card-round bg-light shadow-lg border-0">
                        <div class="card-body instructor_person  text-center">
                            <img src="./imgs/teacher1.jpg"  class="mb-3 rounded-3 img-fluid rounded-3"  alt="">
                            <div class="text-center " >
                                <h4 class="card-title bg-primary text-white p-2 rounded-4 mb-3 fw-bolder img-fluid fw-bold ">Ms. Susheela Pathania</h4>
                                 <h4  class="text-center fw-bolder fs-3 text-muted mb-3" >Guide</h4>
                                 <h6 class="text-center text-primary px-1 mb-4" >
                                    <span class="fa fa-envelope me-2 fw-semibold" ></span>
                                    nishu.susheelapathania@gmail.com
                                 </h6>
                                 <h5 class="text-center full-stack text-white fw-bolder rounded-pill p-2 fs-3" >Assistent professor</h5>
                            </div>
                        </div>

                    </div>
                </div> 

                <div class="col-md-6 col-lg-3">
                    <div class="card card-round bg-light shadow-lg border-0">
                        <div class="card-body instructor_person text-center">
                            <img src="./imgs/monika.jpg" class="mb-3 img-fluid " alt="">
                            <div class="text-center fw-bolder" >
                                 <h4 class="card-title bg-primary text-white p-2 rounded-4 mb-3 fw-bolder img-fluid fw-bold ">Monika</h4>
                                 <h4  class="text-center fw-bold fs-3 text-muted mb-3" >Project Developer</h4>
                                 <h6 class=" text-primary px-1 mb-4" >
                                    <span class="fa fa-envelope me-2 fw-semibold" ></span>
                                    mk3500112@gmail.com
                                 </h6>
                                 <h5 class="full-stack fw-bolder text-white fs-3 rounded-pill p-2" >Full-Stack Developer</h5>                   
                            </div>
                        </div>

                    </div>
                </div> 

                <div class="col-md-6 col-lg-3 ">
                    <div class="card card-round bg-light shadow-lg border-0">
                        <div class="card-body instructor_person text-center">
                            <img src="./imgs/gaurav.jpg" class="mb-3 img-fluid " alt="">
                            <div class="text-center " >
                                <h4 class="card-title bg-primary text-white p-2 rounded-4 mb-3 fw-bolder img-fluid fw-bold ">Gaurav Sharma</h4>
                                 <h4  class="text-center fw-bolder fs-3 text-muted mb-3" >Project Developer</h4>
                                 <h6 class=" text-primary px-1 mb-4" >
                                    <span class="fa fa-envelope fw-semibold me-2" ></span>
                                    gaurav915b@gmail.com
                                 </h6>
                                 <h5 class=" fw-bolder fs-3 full-stack text-white rounded-pill p-2" >Full-Stack Developer</h5>
                            </div>
                        </div>

                    </div>
                </div> 
                </div>
            </div>
            </section>
       
   

    
  <?php

include_once 'footer.php';
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>