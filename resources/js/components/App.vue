
<template>
  <div>
    <h2>Event Management</h2>
    <form @submit.prevent="createEvent">
      <input v-model="form.event_name" placeholder="Event Name" />
      <input type="datetime-local" v-model="form.date_time" />
      <textarea v-model="form.description" placeholder="Description"></textarea>
      <button type="submit">Create Event</button>
    </form>

    <ul>
      <li v-for="event in events" :key="event.id">
        {{ event.event_name }} - {{ event.date_time }}
        <button @click="deleteEvent(event.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      events: [],
      form: {
        event_name: '',
        date_time: '',
        description: '',
        is_active: true,
        is_create_by: 1
      }
    };
  },
  mounted() {
    this.fetchEvents();
  },
  methods: {
    fetchEvents() {
      axios.get('/api/events').then(res => {
        this.events = res.data;
      });
    },
    createEvent() {
      axios.post('/api/events', this.form).then(() => {
        this.fetchEvents();
        this.form.event_name = '';
        this.form.date_time = '';
        this.form.description = '';
      });
    },
    deleteEvent(id) {
      axios.delete(`/api/events/${id}`).then(() => {
        this.fetchEvents();
      });
    }
  }
}
</script>
