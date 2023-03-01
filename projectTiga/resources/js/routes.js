import Parent from './components/ParentComponent.vue'
import Input from './components/Form/InputComponent.vue'
import Update from './components/Form/UpdateComponent.vue'

export const routes = [
  {
    path: "/",
    name: "parent",
    component: Parent
  },
  {
    path: "/input",
    name: "input",
    component: Input
  },
  {
    path: "/update/:id",
    name: "update",
    component: Update
  },
]