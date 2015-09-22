@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
        <?php if ($flashMessage) {
            echo '<div id="flashMessage" class="' . $flashMessage_status . '">' . $flashMessage . '</div>';
        } ?>
        <div class="row marketing">
            <div class="col-lg-6">
                <h4>Log</h4>
                <form action="/log" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <p>
                    User: <select id="user_id" name="user_id">
                        <?php foreach($users as $user) { ?>
                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        <?php } ?>
                    </select>
                    </p>

                    <p>
                    Baby: <select id="baby_id" name="baby_id">
                        <?php foreach($babies as $baby) { ?>
                        <option value="{{$baby->id}}">{{$baby->first_name}} {{$baby->last_name}}</option>
                        <?php } ?>
                    </select>
                    </p>

                    <p>
                    Thing: <select id="thing_id" name="thing_id">
                        <?php foreach($things as $thing) { ?>
                        <option value="{{$thing->thing}}">{{$thing->thing}}</option>
                        <?php } ?>
                    </select>
                    </p>

                    <p id="data_box"></p>

                    <p>Notes:<br/>
                    <textarea id="notes" name="notes"></textarea>
                    </p>

                    <p><input type="submit" name="submit" value="Submit" /></p>
                </form>
            </div>

            <!-- <div class="col-lg-6">
                Other side
            </div> -->
        </div>
@stop