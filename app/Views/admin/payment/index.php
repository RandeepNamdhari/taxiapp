<?php

 $transaction=$response['data']['transaction']??[];
 $intent=$response['data']['intent']??new stdClass();

 ?>
<?= $this->extend('admin/layouts/master') ?>

<?=$this->section('page-style')?>

<style type="text/css">
</style>





<?=$this->endSection()?>

<?= $this->section('content') ?>

  <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Make Payment</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Payments</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Create Payment</a></li>
                                      
                                </div>

                                <div class="col-md-4">
                                    <div class="text-end d-none">
                                     
                                         <a href="<?=base_url('admin/services')?>"  class="btn btn-outline-primary waves-effect waves-light">
                                              <i class="fas fa-arrow-alt-circle-left "></i>&nbsp;Go Back
                                            </a>
                                      
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">

                        <div class="col-lg-12">
                            <h4 class="card-title mb-0 bg-success p-3 text-light">Transaction Details</h4>
                                <div class="card">
                                    <div class="card-body">
                                        
                                    

                                        <div class="mt-3" id="paymentForm">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <h6>User Details</h6>
                                                      <div class="d-flex justify-content-between">
                                                        <div class="text w-50">
                                                            Name:<br>
                                                            Email:<br>
                                                            Phone:
                                                        </div>
                                                         <div class="text-center w-50">
                                                           <?=($transaction['username']?$transaction['username']:$transaction['first_name'])??''?><br>
                                                           <?=$transaction['email']??''?><br>
                                                            <?=$transaction['phone']??''?>
                                                        </div>

                                                </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <h6>Transaction Detail</h6>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="text w-50">
                                                            Type:<br>
                                                            Amount:
                                                        </div>
                                                         <div class="text-center w-50">
                                                           <?=$transaction['model']??''?><br>
                                                            <?=$transaction['amount']??''?>
                                                        </div>

                                                </div>
                                            </div>
                                            </div>
                                            <hr>
                                            <h6 class="p-2 bg-light">Payment Details</h6>

        <div class="row">
            <div class="col-md-6">
                <h6>Existing Payment Options</h6>

            </div>
    
    <div class="col-md-6">
<form id="payment-form">
      <div id="link-authentication-element">
        <!--Stripe.js injects the Link Authentication Element-->
      </div>
      <div id="payment-element">
        <!--Stripe.js injects the Payment Element-->
      </div>
      <div class="col-md-12 text-end mt-3">
      <button id="submit" class="btn btn-success" >
        <div class="spinner hidden" id="spinner"></div>
        <span id="button-text">Pay now</span>
      </button>
  </div>
      <div id="payment-message" class="hidden"></div>
    </form>
</div>
 </div>

                                        </div>
                                      <!-- end form -->
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>

                       </div>





                        </div>
                    </div>





                <?= $this->endSection() ?>

                <?=$this->section('page-script')?>


                <script type="text/javascript">
                    
//                      document.getElementById("paymentForm").addEventListener("submit", function(event) {
//   event.preventDefault(); // Prevents the form from submitting
//    let data=getFormData('paymentForm');
//    let url='<?=base_url('admin/payment/'.$transaction['id']??''.'/store')?>'
//   // console.log(data);return false;
//    submitNormalForm('paymentForm',url,data);
// });

          

        
                </script>


  <script src="https://js.stripe.com/v3/"></script>
<script>
    

const clientSecret='<?php echo $intent->client_secret??''; ?>';
// This is your test publishable API key.
const stripe = Stripe("");

// The items the customer wants to buy
const items = [{ id: "<?=$transaction['model_id']?>" }];

let elements;

initialize();
checkStatus();

document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);

let emailAddress = '';
// Fetches a payment intent and captures the client secret
async function initialize() {
  // const { clientSecret } = await fetch("/create.php", {
  //   method: "POST",
  //   headers: { "Content-Type": "application/json" },
  //   body: JSON.stringify({ items }),
  // }).then((r) => r.json());

  elements = stripe.elements({ clientSecret });

  const linkAuthenticationElement = elements.create("linkAuthentication");
  linkAuthenticationElement.mount("#link-authentication-element");

  const paymentElementOptions = {
    layout: "tabs",
  };

  const paymentElement = elements.create("payment", paymentElementOptions);
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const dataResponse = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      redirect:'if_required',
      return_url: "http://localhost:8080/admin/payment/callback",
        
      receipt_email: "<?=$transaction['email']??''?>",
    },
  });

  console.log(dataResponse);

  const {error}=dataResponse;

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occurred.");
  }

  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageContainer.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}
</script>

               
      

                <?=$this->endSection()?>