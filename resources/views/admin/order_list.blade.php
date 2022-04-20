@extends('layouts.admin')

@section('content')
<div class="content_inner table_content">
    <div class="material_request_outer material">
        <div class="main_title">
            <select class="custom_input material_select">
                <option>Material Request</option>
            </select>
        </div>
        <select class="custom_input filter_order">
            <option>Filter Order</option>
        </select>
        <a class="view_all create" href="#">Create Material Request</a>
        <input class="custom_input search" id="myInput" type="text" placeholder="Type here..." name="" />
    </div>
    <div class="table-responsive">
        <table id="example1" class="table table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        Customer Name
                    </th>
                    <th>Products</th>
                    <th>Orders</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select">
                            <option>Received</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select pending">
                            <option>Pending</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select pending">
                            <option>Pending</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select pending">
                            <option>Pending</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/client.jpg" alt="client" />
                                <span>Clifford</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="name_td">
                            <div class="img_li">
                                <img src="/assets/images/cement.jpg" alt="cement" />
                                <span>Cement</span>
                            </div>
                        </div>
                    </td>
                    <td>#1234567</td>
                    <td>3-22-2022</td>
                    <td>
                        <select class="approve_select pending">
                            <option>Pending</option>
                        </select>
                    </td>
                    <td>$1000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
