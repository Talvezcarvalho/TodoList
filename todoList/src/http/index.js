import server from './server'

export async function getTasks() {
  try {
    const response = await server.get('/tasks')
    return response.data
  } catch (error) {
    console.error(error)
  }
}

export async function createTask(task) {
  try {
    const response = await server.post('/tasks', task)
    return response.data
  } catch (error) {
    console.error(error)
  }
}

export async function updateTask(task) {
  try {
    const response = await server.put(`/tasks/${task.id}`, task)
    return response.data
  } catch (error) {
    console.error(error)
  }
}

export async function deleteTaskById(id) {
  try {
    const response = await server.delete(`/tasks/${id}`)
    return response.data
  } catch (error) {
    console.error(error)
  }
}
