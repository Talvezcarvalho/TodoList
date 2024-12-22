<script setup>
import { computed, ref } from 'vue'
import TaskItem from './taskItem.vue'

const props = defineProps({
  tasks: {
    type: Array,
    required: true,
  },
})

const emit = defineEmits('edit-Task', 'delete-Task', 'changeStatus-Task')

const isDeleteDialogVisible = ref(false)
const taskIdToDelete = ref(null)

const showDeleteDialog = (taskId) => {
  isDeleteDialogVisible.value = true
  taskIdToDelete.value = taskId
}

const closeDeleteDialog = () => {
  isDeleteDialogVisible.value = false
  taskIdToDelete.value = null
}

const filteredTasks = computed(() => {
  return props.tasks.filter((task) => !task.done)
})

const editTask = (task) => {
  emit('edit-Task', task)
}

const deleteTask = () => {
  emit('delete-Task', taskIdToDelete.value)
  closeDeleteDialog()
}

const changeStatusTask = (taskId) => {
  emit('changeStatus-Task', taskId)
}
</script>

<template>
  <q-layout class="custom-layout">
    <q-page-container class="q-pa-none">
      <q-page class="q-pa-md flex justify-center custom-layout">
        <q-list v-if="filteredTasks.length" class="column list-Tasks">
          <q-item class="q-pa-xs" v-for="task in filteredTasks" :key="task.id">
            <TaskItem
              :task="task"
              @save-edit="editTask"
              @delete-Task="showDeleteDialog"
              @changeStatus-Task="changeStatusTask"
            />
          </q-item>
        </q-list>
        <h1 v-else class="text-h5">Sem tarefas para mostrar</h1>
        <q-dialog v-model="isDeleteDialogVisible">
          <q-card>
            <q-card-section>
              <div class="text-h6">Atenção!</div>
              <div>Você está prestes a excluir esta tarefa. Esta ação não pode ser desfeita.</div>
            </q-card-section>
            <q-card-actions>
              <q-btn flat label="Cancelar" @click="closeDeleteDialog" />
              <q-btn flat label="Excluir" color="negative" @click="deleteTask" />
            </q-card-actions>
          </q-card>
        </q-dialog>
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
  width: 100%;
}
</style>
