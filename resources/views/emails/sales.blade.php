@component('mail::message')

<table class="table">
  <tbody>
    <tr><td><strong>Title</strong></td><td>{{$employement['title']}}</td></tr>
    <tr><td><strong>First Name</strong></td><td>{{$employement['first_name']}}</td></tr>
    <tr><td><strong>Last Name</strong></td><td>{{$employement['last_name']}}</td></tr>
    <tr><td><strong>Email</strong></td><td>{{$employement['email']}}</td></tr>
    <tr><td><strong>Phone</strong></td><td>{{$employement['phone']}}</td></tr>
    <tr><td><strong>Cell Number</strong></td><td>{{$employement['cell_number']}}</td></tr>
    <tr><td><strong>Best Time To Call</strong></td><td>{{$employement['best_time_to_call']}}</td></tr>
    <tr><td><strong>Street1</strong></td><td>{{$employement['street1']}}</td></tr>
    <tr><td><strong>Street2</strong></td><td>{{$employement['street2']}}</td></tr>
    <tr><td><strong>City</strong></td><td>{{$employement['city']}}</td></tr>
    <tr><td><strong>State</strong></td><td>{{$employement['state']}}</td></tr>
    <tr><td><strong>Zipcode</strong></td><td>{{$employement['zipcode']}}</td></tr>
    <tr><td><strong>Country</strong></td><td>{{$employement['country']}}</td></tr>
    <tr><td><strong>Position</strong></td><td>{{$employement['position']}}</td></tr>
    <tr><td><strong>Days Available</strong></td><td>{{$employement['days_available']}}</td></tr>
    <tr><td><strong>License</strong></td><td>{{$employement['liecense']}}</td></tr>
    <tr><td><strong>Need Call</strong></td><td>{{$employement['need_call']}}</td></tr>
    <tr><td><strong>Last Comment</strong></td><td>{{$comment['comment']}}</td></tr>
  </tbody>
  </table>

@endcomponent

