<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\PostComment;
use App\Rules\MatchOldPassword;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index() {
        if(auth()->user()->role == "user") {
            $orders = Order::where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('user.index-front')->with('orders', $orders);
        }
        else {
            return view('user.index');
        }
    }

    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('user.users.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success',__('common.successfully_updated_profile'));
        }
        else{
            request()->session()->flash('error',__('common.please_try_again'));
        }
        return redirect()->back();
    }

    // Order
    public function orderIndex(){
        $orders=Order::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders',$orders);
    }
    public function userOrderDelete($id)
    {
        $order=Order::find($id);
        if($order){
           if($order->status=="process" || $order->status=='delivered' || $order->status=='cancel'){
                return redirect()->back()->with('error',__('common.cannot_delete_order'));
           }
           else{
                $status=$order->delete();
                if($status){
                    request()->session()->flash('success',__('common.order_successfully_deleted'));
                }
                else{
                    request()->session()->flash('error',__('common.order_cannot_deleted'));
                }
                return redirect()->route('user.order.index');
           }
        }
        else{
            request()->session()->flash('error',__('common.order_cannot_found'));
            return redirect()->back();
        }
    }

    public function orderShow($id)
    {
        // Scope to the signed-in user — Order::find() alone let anyone read another
        // customer's order (and their name, email and address) by changing the id.
        $order = Order::with(['cart_info.product', 'cart_info.level'])
            ->where('user_id', auth()->user()->id)
            ->findOrFail($id);

        return view('user.order.show')->with('order',$order);
    }
    // Product Review
    public function productReviewIndex(){
        $reviews=ProductReview::getAllUserReview();
        return view('user.review.index')->with('reviews',$reviews);
    }

    public function productReviewEdit($id)
    {
        $review=ProductReview::find($id);
        // return $review;
        return view('user.review.edit')->with('review',$review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewUpdate(Request $request, $id)
    {
        $review=ProductReview::find($id);
        if($review){
            $data=$request->all();
            $status=$review->fill($data)->update();
            if($status){
                request()->session()->flash('success',__('common.review_successfully_updated'));
            }
            else{
                request()->session()->flash('error',__('common.something_went_wrong_retry'));
            }
        }
        else{
            request()->session()->flash('error',__('common.review_not_found'));
        }

        return redirect()->route('user.productreview.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewDelete($id)
    {
        $review=ProductReview::find($id);
        $status=$review->delete();
        if($status){
            request()->session()->flash('success',__('common.review_successfully_deleted'));
        }
        else{
            request()->session()->flash('error',__('common.something_went_wrong_retry'));
        }
        return redirect()->route('user.productreview.index');
    }

    public function userComment()
    {
        $comments=PostComment::getAllUserComments();
        return view('user.comment.index')->with('comments',$comments);
    }
    public function userCommentDelete($id){
        $comment=PostComment::find($id);
        if($comment){
            $status=$comment->delete();
            if($status){
                request()->session()->flash('success',__('common.comment_successfully_deleted'));
            }
            else{
                request()->session()->flash('error',__('common.error_occurred'));
            }
            return back();
        }
        else{
            request()->session()->flash('error',__('common.comment_not_found'));
            return redirect()->back();
        }
    }
    public function userCommentEdit($id)
    {
        $comments=PostComment::find($id);
        if($comments){
            return view('user.comment.edit')->with('comment',$comments);
        }
        else{
            request()->session()->flash('error',__('common.comment_not_found'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userCommentUpdate(Request $request, $id)
    {
        $comment=PostComment::find($id);
        if($comment){
            $data=$request->all();
            // return $data;
            $status=$comment->fill($data)->update();
            if($status){
                request()->session()->flash('success',__('common.comment_successfully_updated'));
            }
            else{
                request()->session()->flash('error',__('common.something_went_wrong_retry'));
            }
            return redirect()->route('user.post-comment.index');
        }
        else{
            request()->session()->flash('error',__('common.comment_not_found'));
            return redirect()->back();
        }

    }

    public function changePassword(){
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('user')->with('success','Password successfully changed');
    }

    
}
