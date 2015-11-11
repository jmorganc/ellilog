@extends('layouts.master')
@section('title', 'Edit a log')
@section('content')
        <?php if ($flashMessage) {
            echo '<div id="flashMessage" class="' . $flashMessage_status . '">' . $flashMessage . '</div>';
        } ?>
        <div class="row marketing">
            <div class="col-lg-6">
                <h3>Edit a log</h3>
                <form action="/log/{{$logs->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select id="user_id" name="user_id" class="form-control">
                        <?php foreach($users as $user) {
                            $selected = '';
                            if ($logs->user_id === $user->id) {
                                $selected = ' selected="selected"';
                            }
                        ?>
                            <option value="{{$user->id}}"<?php echo $selected; ?>>{{$user->first_name}} {{$user->last_name}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="baby_id">Baby:</label>
                        <select id="baby_id" name="baby_id" class="form-control">
                        <?php foreach($babies as $baby) {
                            $selected = '';
                            if ($logs->baby_id === $baby->id) {
                                $selected = ' selected="selected"';
                            }
                        ?>
                            <option value="{{$baby->id}}"<?php echo $selected; ?>>{{$baby->first_name}} {{$baby->last_name}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thing_id">Thing:</label>
                        <select id="thing_id" name="thing_id" class="form-control">
                        <?php foreach($things as $thing) {
                            $selected = '';
                            if ($logs->thing_id === $thing->thing) {
                                $selected = ' selected="selected"';
                            }
                        ?>
                            <option value="{{$thing->thing}}"<?php echo $selected; ?>>{{$thing->thing}}</option>
                        <?php } ?>
                        </select>
                    </div>

                    <p id="data_box">
                        <input type="hidden" id="edit" value="true" />
                        <input type="hidden" id="thing" value="{{$logs->thing_id}}" />
                        <input type="hidden" id="data" value="{{$logs->data}}" />
                    </p>

                    <label for="notes">Notes:</label>
                    <textarea id="notes" name="notes" class="form-control">{{$logs->notes}}</textarea>
                    </p>

                    <input type="submit" name="submit" value="Update" class="btn btn-primary" />
                </form>
            </div>
        </div>
@stop