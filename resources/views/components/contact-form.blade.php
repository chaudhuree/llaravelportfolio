<section class="py-5">
    <div class="container px-5">
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Get in touch</h1>
                <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form id="contactForm" >
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">message has been successfully submitted !</div>

                                <br />
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    const element = document.getElementById('contactForm');
    const successmessagenotification = document.getElementById('submitSuccessMessage');
    const errormessagenotification = document.getElementById('submitErrorMessage');


    element.addEventListener('submit', async function (e) {
        e.preventDefault();

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let message = document.getElementById('message').value;

        if (name === "" || email === "" || phone === "" || message === "") {
            alert("Please fill all the fields");
        } else {
            let formData = {
                fullName: name,
                email: email,
                phone: phone,
                message: message
            }
            let URL = "/contactRequest"
            // loader show
            document.getElementById('loading-div').classList.remove('d-none');
            document.getElementById('content-div').classList.add('d-none');
            let result= await axios.post(URL, formData);
            // loader hide
            document.getElementById('loading-div').classList.add('d-none');
            document.getElementById('content-div').classList.remove('d-none');
            if(result.status===200 && result.data===1){
                successmessagenotification.classList.remove('d-none');
                element.reset();
                setTimeout(function () {
                    successmessagenotification.classList.add('d-none');
                }, 3000 );
            }else {
                errormessagenotification.classList.remove('d-none');
                setTimeout(function () {
                    errormessagenotification.classList.add('d-none');
                }, 3000 );
            }
        }
    });
</script>
