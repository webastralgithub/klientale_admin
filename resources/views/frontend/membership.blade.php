@extends('frontend.layouts.app')

@section('content')
<main id="main">


   <!-- ======= Features Section ======= -->
   <section id="" class="features pricing-plan-sec membership-header-sec">

      <header class="section-header">
         @if(\Session::has('error'))
         <div id="error-alert">
            <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
         </div>
         @endif

         @if(\Session::has('success'))
         <div id="success-alert">
            <li class="alert alert-success">{!! \Session::get('success') !!}</li>
         </div>
         @endif
         <h2>Membership</h2>
         <p class="parah-cum-p">Klientale Memberships</p>

         <p class="parah-btm"><b>Save upto 50%</b> on Premium Plans! Valid for limited Periods!</p>
      </header>

      <div class="tab-container">
         <h6>Choose your plan by selecting the category</h6>

         <div class="tab-menu">
            <ul>
               <li><a href="#" class="tab-a active-a" data-id="tab1">Critical Illness Insurance</a></li>
               <li><a href="#" class="tab-a" data-id="tab2">Disability Insurance</a></li>
               <li><a href="#" class="tab-a" data-id="tab3">Travel Insurance</a></li>
               <li><a href="#" class="tab-a" data-id="tab4">Business Insurance</a></li>

               <li><a href="#" class="tab-a" data-id="tab5">Health Insurance</a></li>
               <li><a href="#" class="tab-a" data-id="tab6">Life Insurance</a></li>
               <li><a href="#" class="tab-a" data-id="tab7">Home Insurance</a></li>
               <li><a href="#" class="tab-a" data-id="tab8">Auto Insurance</a></li>
            </ul>
         </div><!--end of tab-menu-->
         <div class="tab tab-active" data-id="tab1">
            @foreach($memberships as $membership)
            <div class="price-tab-intb popular">
               @if($membership->is_popular == 1)<span class="badge-p"><span>Popular</span> </span>@endif
               <div class="price-blck-left">
                  <h5>{{isset($membership->name) ? $membership->name :''}}</h5>
                  <p>{{isset($membership->description) ? $membership->description :''}}</p>
               </div>

               <div class="price-blck-right">
                  <h4>$ {{ isset($membership->price) ? $membership->price : '' }} /-</h4>

                  @auth
                  <form action="{{ route('subscribe') }}" method="POST">
                     @csrf
                     <input type="hidden" name="is_subscribed" value="{{ $membership->is_subscribed }}">
                     <input type="hidden" name="membership_id" value="{{ $membership->id }}">
                     <button type="submit">Subscribe</button>
                  </form>
                  @else
                  <h5>Please<a href="{{ route('login') }}" style="    background: #0d60ab; padding: 10px 23px !important; margin: 0 8px 0px 5px; border-radius: 20px; color: #fff !important; font-size: 14px !important;">login</a>to subscribe.</h5>
                  @endauth
               </div>

            </div>
            @endforeach
         </div><!--end of tab one-->

         <div class="tab " data-id="tab2">

         </div><!--end of tab two-->
         <div class="tab " data-id="tab3">

         </div><!--end of tab three-->

         <div class="tab " data-id="tab4">

         </div><!--end of tab three-->

         <div class="tab " data-id="tab5">

         </div><!--end of tab three-->

         <div class="tab " data-id="tab6">

         </div><!--end of tab three-->

         <div class="tab " data-id="tab7">

         </div><!--end of tab three-->

         <div class="tab " data-id="tab8">

         </div><!--end of tab three-->
      </div><!--end of container-->

   </section><!-- End Features Section -->


</main><!-- End #main -->

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
   $(document).ready(function() {
      $('.tab-a').click(function() {
         $(".tab").removeClass('tab-active');
         $(".tab[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
         $(".tab-a").removeClass('active-a');
         $(this).parent().find(".tab-a").addClass('active-a');
      });
   });
</script>