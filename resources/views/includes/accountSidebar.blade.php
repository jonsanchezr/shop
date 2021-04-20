<!-- Account Sidebar-->
<div class="col-lg-4 pb-5">
  <div class="author-card pb-3">
    <div class="author-card-cover" style="background-image: url({{asset('assets/img/widgets/author/cover.jpg')}});"><a class="btn btn-light btn-sm" href="#" data-toggle="tooltip" title="You currently have 290 Reward points to spend"><i class="fe-icon-award text-md"></i>&nbsp;0 points</a>
    </div>
    <div class="author-card-profile">
      <div class="author-card-avatar">
        <img src="{{asset('assets/img/profiles/'.$profile->avatar)}}" alt="Daniel Adams"/>
      </div>
      <div class="author-card-details">
        <h5 class="author-card-name text-lg">{{ Auth::user()->name }}</h5><span class="author-card-position">Joined February 06, 2017</span>
      </div>
    </div>
  </div>
  <div class="wizard">
    <nav class="list-group list-group-flush">

      <a class="list-group-item @if('/users/profile' == $activeTopMenu)
              active
            @endif" href="/users/profile">
        <i class="fe-icon-user text-muted"></i>Profile Settings
      </a>

      <a class="list-group-item @if('/users/orders' == $activeTopMenu)
              active
            @endif" href="/users/orders">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <i class="fe-icon-shopping-bag mr-1 text-muted"></i>
            <div class="d-inline-block font-weight-medium text-uppercase">Orders List</div>
          </div><span class="badge badge-secondary">{{$orders->count()}}</span>
        </div>
      </a>

      <a class="list-group-item @if('/users/address' == $activeTopMenu)
              active
            @endif" href="/users/address" ><i class="fe-icon-map-pin text-muted"></i>Addresses</a>

      <!--<a class="list-group-item" href="account-wishlist.html">
        <div class="d-flex justify-content-between align-items-center">
          <div><i class="fe-icon-heart mr-1 text-muted"></i>
            <div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
          </div><span class="badge badge-secondary">3</span>
        </div>
      </a>
      <a class="list-group-item" href="account-tickets.html">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <i class="fe-icon-tag mr-1 text-muted"></i>
            <div class="d-inline-block font-weight-medium text-uppercase">My Tickets</div>
          </div>
          <span class="badge badge-secondary">4</span>
        </div>
      </a>-->
      
    </nav>
  </div>
</div>