<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Tareas') ?></li>
        <li><?= $this->Html->link(__('Listas de  Asistencias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Periodos de actividad'), ['controller' => 'Periodosactividad', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Periodo de actividad'), ['controller' => 'Periodosactividad', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Asistencias'), ['controller' => 'Asistenciapersonas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Asistencia de Persona'), ['controller' => 'Asistenciapersonas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="asistencias form large-9 medium-8 columns content">
    <?= $this->Form->create($asistencia) ?>
    <fieldset>
        <legend><?= __('Añadir Control de Asistencia') ?></legend>
        <?php
            echo $this->Form->input('FechadeInicio',[ 'label' => 'Fecha de inicio']);
            echo $this->Form->input('FechaFin',[ 'label' => 'Fecha final']);
            echo $this->Form->input('horario_id', ['options' => $horarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
