@extends('layouts.admin')

@section('content')
<!-- Page Content  -->
<div class="content_inner table_content">
    <div class="material_request_outer">
        <div class="main_title">
            Product List
        </div>
        <div class="add_new_product">
            <a class="view_all create" href="{{ route('admin.product.add') }}">+ Add New Product</a>
            <input class="custom_input search" type="text" placeholder="Type here..." name="" />
        </div>
    </div>
    <div class="table-responsive">
        <table id="example1" class="table table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        Item
                    </th>
                    <th>Category Type</th>
                    <th>Price</th>
                    <th>Stocks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>{{ $product['name'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td>Category1</td>
                    <td>
                        <div class="price_div">
                            <span>₦</span>
                            <input class="custom_input" type="text" placeholder="{{ $product['price'] }}" name="" />
                        </div>
                    </td>
                    <td>
                        <input type="text" placeholder="{{ $product['stock'] }}" class="custom_input stock_input" name="" />
                    </td>
                    <td>
                        <div class="status_div">
                            <!--div class="toggle-switch">
                                <input type="checkbox" id="chkTest" name="chkTest" />
                                <label for="chkTest">
                                    <span class="toggle-track"></span>
                                </label>
                            </div-->
                            <!--select class="custom_input">
                                <option value="null" selected="" disabled="">Select Action</option>
                                <option><a class="text-decoration-none text-dark me-2" href="{{ route('admin.product.edit', \Illuminate\Support\Facades\Crypt::encrypt($product['id'])) }}">Edit</a></option>
                            </select-->

                            <a class="text-decoration-none text-dark me-2" href="{{ route('admin.product.edit', \Illuminate\Support\Facades\Crypt::encrypt($product['id'])) }}">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.746 2.87692L19.1229 0.253846C18.7845 -0.0846154 18.2768 -0.0846154 17.9383 0.253846L16.3306 1.86154L10.0691 8.12308C9.98447 8.20769 9.98447 8.29231 9.89986 8.37692C9.89986 8.37692 9.89986 8.37692 9.89986 8.46154L8.54601 12.4385C8.4614 12.7769 8.54601 13.1154 8.71524 13.2846C8.88447 13.4538 9.0537 13.5385 9.30755 13.5385C9.39217 13.5385 9.47678 13.5385 9.5614 13.4538L13.5383 12.1C13.5383 12.1 13.5383 12.1 13.6229 12.1C13.7076 12.1 13.7922 12.0154 13.8768 11.9308L21.746 4.06154C22.0845 3.72308 22.0845 3.21538 21.746 2.87692ZM19.9691 3.46923L19.546 3.89231L18.1076 2.45385L18.5306 2.03077L19.9691 3.46923ZM13.2845 10.1538L12.6076 9.47692L11.846 8.71538L16.9229 3.63846L18.3614 5.07692L13.2845 10.1538ZM10.6614 11.3385L10.9999 10.3231L11.6768 11L10.6614 11.3385Z" fill="black"></path>
                                <path d="M17.7692 11.8463C17.2615 11.8463 16.9231 12.1848 16.9231 12.6925V18.6155C16.9231 19.5463 16.1615 20.3078 15.2308 20.3078H3.38462C2.45385 20.3078 1.69231 19.5463 1.69231 18.6155V6.76938C1.69231 5.83861 2.45385 5.07707 3.38462 5.07707H9.30769C9.81538 5.07707 10.1538 4.73861 10.1538 4.23092C10.1538 3.72323 9.81538 3.38477 9.30769 3.38477H3.38462C1.52308 3.38477 0 4.90784 0 6.76938V18.6155C0 20.4771 1.52308 22.0002 3.38462 22.0002H15.2308C17.0923 22.0002 18.6154 20.4771 18.6154 18.6155V12.6925C18.6154 12.1848 18.2769 11.8463 17.7692 11.8463Z" fill="black"></path>
                              </svg>
                          </a>

                          <a class="text-decoration-none text-dark fs-5" href="{{ route('admin.proudct.delete',  \Illuminate\Support\Facades\Crypt::encrypt($product['id'])) }}"><i class="fas fa-trash-alt"></i></a>


                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
