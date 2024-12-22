<script setup>
import { createTask, deleteTaskById, getTasks, updateTask } from '@/http'
import InserirTarefa from './taskInsert.vue'
import TaskList from './taskList.vue'

import { onMounted, ref } from 'vue'
import CompletedTaskList from './completedTaskList.vue'

const tasks = ref([])

onMounted(async () => {
  tasks.value = await getTasks()
})

const insertTask = async (task) => {
  const newTask = await createTask(task)
  if (newTask) {
    tasks.value.push(newTask)
  }
}

const editTask = async (task) => {
  const editedTask = await updateTask(task)
  tasks.value = tasks.value.map((t) => (t.id === editedTask.id ? editedTask : t))
}

const deletedTask = async (taskId) => {
  console.log(taskId)
  await deleteTaskById(taskId)
  tasks.value = tasks.value.filter((task) => task.id !== taskId)
}

const changeStatusTask = async (taskId) => {
  const task = tasks.value.find((task) => task.id === taskId)
  task.done = !task.done
  const editedTask = await updateTask(task)
  tasks.value = tasks.value.map((t) => (t.id === editedTask.id ? editedTask : t))
}
</script>

<template>
  <q-page-container class="taskBody">
    <q-card class="q-my-md">
      <q-card-section>
        <h4 class="text-center text-regular">Gerenciar Tarefas</h4>
      </q-card-section>

      <!-- Componente para inserir nova tarefa -->
      <q-card-section>
        <InserirTarefa @insert-task="insertTask" />
      </q-card-section>

      <!-- Lista de tarefas com TaskList -->
      <q-card-section>
        <TaskList
          :tasks="tasks"
          @edit-Task="editTask"
          @delete-Task="deletedTask"
          @changeStatus-Task="changeStatusTask"
        />
        <q-separator class="q-my-md" />
        <CompletedTaskList
          :tasks="tasks"
          @changeStatus-Task="changeStatusTask"
          class="customList"
        />
      </q-card-section>
    </q-card>
  </q-page-container>
</template>

<style scoped>
.taskBody {
  padding: 0.1em 8em;
  margin: auto;
  width: 1000px;
}

.customList {
  min-height: 0 !important;
}
</style>
