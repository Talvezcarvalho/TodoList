import server from './server'

export async function getTasks() {
  try {
    const response = await server.get('/tasks')
    return response.data
  } catch (error) {
    console.error(error)
  }
}
