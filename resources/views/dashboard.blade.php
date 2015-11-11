@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
        <?php if ($flashMessage) {
            echo '<div id="flashMessage" class="' . $flashMessage_status . '">' . $flashMessage . '</div>';
        } ?>
        <div class="row marketing">
            <div class="col-sm-6">
                <h3>Log a thing</h3>
                <form action="/log" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group required">
                        <p><label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="" class="form-control required"/></p>
                        <p><label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="" class="form-control required"/></p>
                        <p><label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" value="" class="form-control required"/></p>
                        <p><label for="address">Address:</label>
                        <input type="text" name="address" id="address" value="" class="form-control required"/></p>
                    </div>

                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select id="user_id" name="user_id" class="form-control">
                        <?php foreach($users as $user) { ?>
                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="baby_id">Baby:</label>
                        <select id="baby_id" name="baby_id" class="form-control">
                        <?php foreach($babies as $baby) { ?>
                            <option value="{{$baby->id}}">{{$baby->first_name}} {{$baby->last_name}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thing_id">Thing:</label>
                        <select id="thing_id" name="thing_id" class="form-control">
                        <?php foreach($things as $thing) {
                            $selected = '';
                            if ($thing->thing === 'Bottle') {
                                $selected = ' selected="selected"';
                            }
                        ?>
                            <option value="{{$thing->thing}}"<?php echo $selected; ?>>{{$thing->thing}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <p id="data_box">
                        <input type="hidden" id="edit" value="false" />
                    </p>

                    <p>
                    <label for="notes">Notes:</label>
                    <textarea id="notes" name="notes" class="form-control"></textarea>
                    </p>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                </form>
            </div>

            <div class="col-sm-6">
                <h3>Recent logs</h3>
                <table class="table table-striped">
                    <tr><th></th><th>Time</th><th>Thing</th><th>Data/Note</th><th></th></tr>
                <?php foreach($logs as $log) {
                    $log_data = json_decode($log->data, TRUE);
                    $start_time  = $log->created_at;
                    if (array_key_exists('start_time', $log_data)) {
                        $start_time  = $log_data['start_time'];
                    }
                    $datetime = new DateTime($start_time);
                    $datetime_now = new DateTime();
                    $datetime_diff = $datetime_now->diff($datetime);
                    $datetime_diff = $datetime_diff->format('%H:%I ago');
                    echo '<tr class="clickable">';
                    echo '<td><a href="/log/edit/' . $log->id . '"></a></td>';
                    echo '<td>' . $datetime->format('g:i a') . '</td>';
                    echo '<td>' . $log->thing_id . '</td>';
                    echo '<td>';
                    if ($log->thing_id === 'Pee' || $log->thing_id === 'Poop' || $log->thing_id === 'Comment' || $log->thing_id === 'Nurse') {
                        echo $log->notes;
                    } else if ($log->thing_id === 'Nap') {
                        if ($log_data['end_time'] === 'Edit this on wake up') {
                            echo $log_data['end_time'];
                        } else {
                            $datetime_nap_start = new DateTime($log_data['start_time']);
                            $datetime_nap_end = new DateTime($log_data['end_time']);
                            $nap_diff = $datetime_nap_end->diff($datetime_nap_start);
                            $nap_diff = $nap_diff->format('%H:%I nap');
                            echo $nap_diff;
                        }
                    } else if ($log->thing_id === 'Bottle') {
                        echo $log_data['data'] . ' oz.';
                    } else {
                        echo $log_data['data'];
                    }
                    echo '</td>';
                    echo '<td>' . $datetime_diff . '</td>';
                    echo '</a></tr>';
                } ?>
                </table>
            </div>
        </div>
@stop