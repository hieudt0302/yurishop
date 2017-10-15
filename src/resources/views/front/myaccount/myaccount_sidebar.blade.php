<div class="card myaccount-menu">
    <h5 class="card-header" style="border-bottom: none">
        My account
    </h5>
    <div class="list-group list-group-flush has-icons">
        <a id="account-info" href="{{url('Account/Info')}}" rel="nofollow" class="list-group-item list-group-item-action">
            <i class="fa fa-fw fa-user-o list-group-item-icon"></i>
            <span>Customer info</span>
        </a>
        <a id="account-addresses " href="{{url('Account/Addresses')}}" rel="nofollow" class="list-group-item list-group-item-action">
            <i class="fa fa-address-book-o list-group-item-icon"></i>
            <span>Addresses</span>
        </a>
        <a id="account-orders" href="{{url('Account/Orders')}}" rel="nofollow" class="list-group-item list-group-item-action">
            <i class="fa fa-fw fa-file-text list-group-item-icon"></i>
            <span>Orders</span>
        </a>
        <a id="account-changepassword" href="{{url('Account/ChangePassword')}}" rel="nofollow" class="list-group-item list-group-item-action">
            <i class="fa fa-fw fa-unlock-alt list-group-item-icon"></i>
            <span>Change password</span>
        </a>
    </div>
</div>