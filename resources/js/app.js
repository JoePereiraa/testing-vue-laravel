import './bootstrap';

import { createApp } from "vue";

import Card from "./components/Drag/Card.vue";
import Column from './components/Drag/Column.vue';
import Draggable from './components/Drag/Draggable.vue';
import Chat from "./components/Chat.vue";

const app = createApp();

app.component('Card', Card);
app.component('Chat', Chat);
// app.component('Column', Column);
// app.component('Draggable', Draggable);
// app.component('CardChat', CardChat);

app.mount('#app')