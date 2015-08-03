@extends('layouts.master')

@section('content')
    <div>
        <table class="table">
            <tr>
                <?php foreach ($results[0]->toArray() as $field => $value): ?>
                    <td><?= $field ?></td>
                <?php endforeach; ?>
            </tr>

            <?php foreach ($results as $iterator => $object): ?>
                <tr>
                    <?php foreach ($object->toArray() as $field_name => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
@stop
