<script setup>
import { computed } from 'vue'
import TaskItem from './taskItem.vue'

const props = defineProps({
  tasks: {
    type: Array,
    required: true,
  },
})

const emit = defineEmits('edit-Task', 'delete-Task', 'changeStatus-Task')

const filteredTasks = computed(() => {
  return props.tasks.filter((task) => !task.done)
})

const editTask = (task) => {
  emit('edit-Task', task)
}

const deleteTask = (taskId) => {
  emit('delete-Task', taskId)
}

const changeStatusTask = (taskId) => {
  emit('changeStatus-Task', taskId)
}
</script>

<template>
  <q-layout class="custom-layout">
    <q-page-container class="q-pa-none">
      <q-page class="q-pa-md flex justify-center custom-layout">
        <q-list class="column list-Tasks">
          <q-item class="q-pa-xs" v-for="task in filteredTasks" :key="task.id">
            <TaskItem
              :task="task"
              @save-edit="editTask"
              @delete-Task="deleteTask"
              @changeStatus-Task="changeStatusTask"
            />
          </q-item>
        </q-list>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<style scoped>
.custom-layout {
  min-height: unset !important;
  height: auto !important;
}

.list-Tasks {
  gap: 0em;
}
</style>
