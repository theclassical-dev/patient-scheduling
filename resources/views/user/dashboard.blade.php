@extends('layouts.front')

@section("content")
{{-- <script type="text/javascript">

    let input = document.querySelector(".input")
    let button = document.querySelector(".button")

    button.disabled = true

    input.addEventListener("change", stateHandle)

    function stateHandle() {
    if (document.querySelector(".input").value === "") {
        button.disabled = true
    } else {
        button.disabled = false
    }
    }
</script> --}}
<script>
    function toggleButton()
    {
        // var card = document.getElementById('card').value;
        // var expire = document.getElementById('expire').value;
        var cvv = document.getElementById('cvv').value;

        if (cvv) {
            document.getElementById('submitButton').disabled = false;
        } else {
            document.getElementById('submitButton').disabled = true;
        }
    }
</script>
<div class="row" style="margin-top: 70px">
    <!-- /.col -->
    {{-- @include('layouts.pay') --}}
    <div class="col-lg-4 offset-lg-4 col-12">
      <div class="box">
        <div class="box-body text-center">
            <div class="col-12 text-uppercase" style="background: rgb(79, 79, 129); color: #fff">
                <h4 class="box-title mt-3" style="color: #fff;">Certification Payment</h4><br>
                <h5 class="box-title" style="color: #fff;">{{ auth()->user()->email}}</h5>
                <p class="m-0">(NGN 10,000)</p> <hr>
            </div>
            <div class="col-12" style="border: 1px solid rgb(79, 79, 129)">
                <div class="row">
                    <div class="col-6" style="background: rgb(197, 193, 193); height: 50px;">
                        <h6 class="mt-10" style="color: white; font-size: 24px;">PAY WITH CARD</h6>
                    </div>
                    <div class="col-6" style=" height: 50px;">
                    <h6 class="mt-10" style="font-size: 24px;">PAY WITH BANK</h6>
                    </div>
                </div>
            </div><hr>
            <div class="col-12">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="box">
					  	  <div class="box-body">
							  <code>Credit card</code>
							  <input type="text" name="a" class="form-control" id="creditcard"  style="height:55px;font-size:14pt;" required>					  
						  </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="box">
                                    <div class="box-body">
                                        <code>mm:yy</code>
                                        <input type="time" name="b"  class="form-control" style="height:55px;font-size:14pt;" placeholder="mm:yy" required>
                                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">					  
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="box">
                                    <div class="box-body">
                                    <code>cvv</code>
                                    Cvv:<input type="text" name="c" class="form-control input" style="height:55px;font-size:14pt;" placeholder="e.g 897" id="cvv" onchange="toggleButton()" required>						  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="https://web.facebook.com/?_rdc=1&_rdr" id="sa-success"><button type="submit" name="pay" class="btn btn-primary" id="submitButton" disabled><span>Pay</span></button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

  </div>
@endsection