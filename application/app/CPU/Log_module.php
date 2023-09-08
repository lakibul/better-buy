<?php

namespace App\CPU;

use App\Model\EcomAdminActivityLog;
use App\Model\SellerActivityLog;
use Illuminate\Support\Facades\Request;
use function Symfony\Component\String\b;

class Log_module
{

    public static function adminLogin()
    {
        $description = 'Admin Logged in';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'admin_login';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function adminProfileUpdate($data)
    {
        $description = 'Admin Profile Updated';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'admin_profile_update';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = '';
        $admin->save();
        return $admin;
    }

    public static function adminEmergencyContact($description)
    {
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'emergency_contact';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function adminShippingMethodAdd($data)
    {
        $description = 'Admin Added a shipping Method';

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'admin_login';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerEmergencyContact($description)
    {
        $admin = new SellerActivityLog();
        $admin->activity_type = 'emergency_contact';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProfileUpdate($data)
    {
        $description = 'Seller Profile Updated';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'profile_update';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerPassChange($data)
    {
        $description = 'Seller Changed his password';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'change_password';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerBankInfoUpdate($data)
    {
        $description = 'Seller Changed his Bank Info';

        $admin = new SellerActivityLog();
        $admin->activity_type = 'change_bank_info';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function adminPassChange($data)
    {
        $description = 'Admin Changed his password';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'change_password';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function adminCategoryShippingCostAdd()
    {
        $description = 'Category cost successfully updated.';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'category_cost';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function adminCustomerRoleAdd()
    {
        $description = 'Customer Role added successfully by Admin!';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_role';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function adminCustomerRoleUpdate()
    {
        $description = 'Customer Role updated successfully by Admin!';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_role';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function employeeStatusRoleUpdate()
    {
        $description = 'Employee Role updated successfully by Admin!';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_role';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerCategoryShippingCostAdd()
    {
        $description = 'Category cost successfully updated.';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'category_cost';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function newCategory($category)
    {

        $description = 'New Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'new_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function newSubCategory()
    {

        $description = 'New Sub Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'new_sub_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function newSubSubCategory()
    {

        $description = 'New Sub Sub Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'new_sub_sub_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function updateSubSubCategory()
    {

        $description = 'Update Sub Sub Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'update_sub_sub_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function deleteSubSubCategory()
    {

        $description = 'Delete Sub Sub Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'delete_sub_sub_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function updateSubCategory()
    {

        $description = 'Update Sub Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'update_sub_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function deleteSubCategory()
    {

        $description = 'Delete Sub Category Added';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'delete_sub_category';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function updateCategory($category)
    {
        $description = 'A Category Updated';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'category_update';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function deleteCatgory($category)
    {
        $description = 'A Category Deleted';

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'category_delete';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function catgoryStatus($category)
    {
        $description = 'Category Status Changed to' . $category->home_status;

        $categories = new EcomAdminActivityLog();
        $categories->activity_type = 'category_status';
        $categories->user_id = 1;
        $categories->description = $description;
        $categories->note = '';
        $categories->device_id = '1234';
        $categories->ip_address = Request::ip();
        $categories->save();
        return $categories;
    }

    public static function newBrand($data)
    {
        $description = @$data->name . ' ' . 'Brand Created';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'brand_create';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function contactAdd()
    {
        $description = 'A contact added';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'contact_add';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function contactUpdate()
    {
        $description = 'A contact updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'contact_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function contactDelete()
    {
        $description = 'A contact deleted';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'contact_delete';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sendMailToContact()
    {
        $description = 'send mail to contact';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'send_mail';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function couponAdd($coupon)
    {
        $description = $coupon->title . 'Coupon added';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'coupon_add';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function couponUpdated($coupon)
    {
        $description = $coupon->title . 'Coupon Updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'coupon_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function couponStatus($coupon)
    {
        $description = 'Coupon Status Updated to' . $coupon->status;

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'coupon_status_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function couponDelete($coupon)
    {
        $description = $coupon->title . ' ' . 'coupon deleted';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'coupon_delete';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function orderStatus($order)
    {
        $description = 'Order Status Changed' . $order->order_status;

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'coupon_status_change';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerOrderStatus($order)
    {
        $description = 'Order Status Changed' . $order->order_status;

        $brand = new SellerActivityLog();
        $brand->activity_type = 'coupon_status_changed';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function orderDeliver()
    {
        $description = 'Order Delivered';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'order_deliver';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function orderAmountDate()
    {
        $description = 'Order Amount Date Updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'amount_date_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerOrderAmountDate()
    {
        $description = 'Order Amount Date Updated';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'amount_date_update';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function orderPaymentStatus()
    {
        $description = 'Order Payment Status Updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'payment_status_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerOrderPaymentStatus()
    {
        $description = 'Order Payment Status Updated';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'payment_status_update';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function orderInvoice()
    {
        $description = 'Order Invoice Generated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'invoice_generate';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerOrderInvoice()
    {
        $description = 'Order Invoice Generated';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'invoice_generate';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function digitalFile()
    {
        $description = 'Digital File Uploaded';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'digital_file_uploade';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerProductDigitalFile()
    {
        $description = 'Digital File Uploaded';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'digital_file_uploade';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function digitalFileFailed()
    {
        $description = 'Digital File Uploade Failed';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'digital_file_upload_fail';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerProductDigitalFileFailed()
    {
        $description = 'Digital File Uploade Failed';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'digital_file_upload_fail';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function driver_info_update()
    {
        $description = 'Driver Info Updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'driver_info_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function seller_driver_info_update()
    {
        $description = 'Driver Info Updated';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'driver_info_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        //$brand->save();
        return $brand;
    }

    public static function deliveryManAdded()
    {
        $description = 'delivery Man Added';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'delivery_man_add';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerDeliveryManAdded()
    {
        $description = 'Delivery Man Added by Seller';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'delivery_man_add';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function deliveryManTransaction()
    {
        $description = 'Delivery Man Transaction done';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'delivery_man_transaction';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function sellerDeliveryManTransaction()
    {
        $description = 'Delivery Man Transaction done';

        $brand = new SellerActivityLog();
        $brand->activity_type = 'delivery_man_transaction';
        $brand->user_id = '';
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function updateBrand($data)
    {
        $description = $data->name . 'Brand Updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'brand_update';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }


    public static function updateStatus($data)
    {
        $description = $data->name . 'Brand Status Updated';

        $brand = new EcomAdminActivityLog();
        $brand->activity_type = 'brand_status';
        $brand->user_id = 1;
        $brand->description = $description;
        $brand->note = '';
        $brand->device_id = '1234';
        $brand->ip_address = Request::ip();
        $brand->save();
        return $brand;
    }

    public static function deleteBrand($data)
    {
        $description = $data->name . 'Brand Deleted';

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'brand_delete';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function newAttribute($data)
    {
        $description = 'A Product Attribute Added' . ' ' . @$data->name;

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_attribute';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function updateAttribute($data)
    {
        $description = 'A Product Attribute Updated' . ' ' . @$data->name;

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_attribute';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function deleteAttribute($data)
    {
        $description = 'A Product Attribute Deleted' . ' ' . @$data->name;

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_attribute';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productFeatureStatus($data)
    {
        $description = 'Featured status changed' . ' ' . @$data->name;
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_status';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productApproveStatus($data)
    {
        $description = 'Product Request status changed' . ' ' . @$data->name;
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_status';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productUpdateStatus($data)
    {
        $description = 'Product status Updated' . ' ' . @$data->name;
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_status';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productUpdateShipping($data)
    {
        $description = 'Product Shipping Updated' . ' ' . @$data->name;
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_shipping';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productStatusDeny($data)
    {
        $description = 'Product Request status Denied' . ' ' . @$data->name;
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_request';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productClone($data)
    {
        $description = 'A Product Cloned Successfully' . ' ' . @$data->name;
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_clone';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function newProduct($data)
    {
        $description = @$data->name . ' ' . 'New Product Added';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_add';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productUpate($data)
    {
        $description = @$data->name . ' ' . 'A Product Updated';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_update';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productRemoved($data)
    {
        $description = @$data->name . ' ' . 'A Product Removed';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_remove';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productExport()
    {
        $description = 'Products Exported by Excel';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_export';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function orderExport()
    {
        $description = 'Order Exported by Excel';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'order_export';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerOrderExport()
    {
        $description = 'Order Exported by Excel';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'order_export';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function bulkImport()
    {
        $description = 'Products Imported by Excel';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_import';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function bulkImportFailed()
    {
        $description = 'Products Imported Failed';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_import';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productBluckImportSuccess()
    {
        $description = 'Bulk Products imported failed!';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'bulk_import';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productBluckImportFailed()
    {
        $description = 'Bulk Products imported successfully!';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'order_export';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductBluckImportFailed()
    {
        $description = 'Bulk Products imported Failed!';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'order_export';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductBluckImportSuccess()
    {
        $description = 'Bulk Products imported successfully!';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'order_export';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductStocksImportSuccess()
    {
        $description = 'Stock Products imported successfully!';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'stock_product';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductStocksImportFail()
    {
        $description = 'Stock Products imported Failed!';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'stock_product';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productImageRemoved($data)
    {
        $description = @$data->name . ' ' . 'Product Image Removed';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productQuantityUpdate($data)
    {
        $description = @$data->name . ' ' . 'Product Quantity updated';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_quantity';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function productBarcode()
    {
        $description = 'Product Barcode Generated';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'product_barcode';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductBarcode()
    {
        $description = 'Product Barcode Generated';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'product_barcode';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function CustomerStatusUpdate($data)
    {
        if ($data->is_active == 1) {
            $description = 'Customer Status Active';
        } else {
            $description = 'Customer Status InActive';
        }
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_status';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function deleteCustomer($data)
    {
        $description = $data->name . 'Customer Deleted';

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_delete';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function customerSettingUpdate()
    {
        $description = 'Customer Settings Updates';

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_setting';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function customerExport()
    {
        $description = 'Customers Exported by Excel';

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_export';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function roleDelete()
    {
        $description = 'Customers Role Deleted by Admin';

        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'customer_role_delete';
        $admin->user_id = 1;
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerLogin()
    {
        $description = 'A seller Logged In';

        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_login';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerLogOut()
    {
        $description = 'A seller Logged Out';

        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_logout';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductStatusUpdate($data, $status)
    {
        if ($status == 0) {
            $description = 'Seller set the product status as Inactive';
        } else {
            $description = 'Seller set the product status as Active';
        }
        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_product_status';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductFeatureStatus($data)
    {
        $description = @$data->name . ' ' . 'Featured status changed';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_product_status';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerNewProduct($data)
    {
        $description = 'Seller added a new product' . ' ' . @$data->name;
        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_product';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductQuantityUpdate($data)
    {
        $description = @$data->name . ' ' . 'Product Quantity updated';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_product_quantity';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductUpate($data)
    {
        $description = @$data->name . ' ' . 'Product updated by Seller';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_product';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductImageRemoved($data)
    {
        $description = @$data->name . ' ' . 'Product Image Removed';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'seller_product';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductRemoved($data)
    {
        $description = @$data->name . ' ' . 'Product Removed by seller';
        $admin = new EcomAdminActivityLog();
        $admin->activity_type = 'seller_product';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }

    public static function sellerProductExport()
    {
        $description = 'Products Exported by Excel';
        $admin = new SellerActivityLog();
        $admin->activity_type = 'product_export';
        $admin->user_id = '';
        $admin->description = $description;
        $admin->note = '';
        $admin->device_id = '1234';
        $admin->ip_address = Request::ip();
        $admin->save();
        return $admin;
    }
}
