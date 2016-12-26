<table border="1">

    <thead>
    <tr>
        <td>Event type</td>
        <td>Result (send status or some exception)</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($params['messagesStatuses'] as $gateway => $result): ?>

        <tr>
            <td><?= $gateway ?></td>
            <td>

                <?php

                if (is_object($result) && 'Exception' == get_parent_class($result)) {

                    echo sprintf('Exception: %s, Błąd: %s',
                        get_class($result),
                        $result->getMessage()
                    );

                } else {

                    echo 'Status: ' . (true == $result ? 'OK' : 'ERROR');

                }

                ?>

            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>

</table>
