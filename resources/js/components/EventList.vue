<template>
  <div>
    <h2>Event List</h2>
    <div v-if="loading">Loading...</div>
    <div v-else>
      <div v-for="event in events" :key="event.id" class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">{{ event.event_name }}</h5>
          <p class="card-text">{{ event.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      events: [],
      loading: true,
    };
  },
  mounted() {
    fetch('/api/events')
      .then((res) => res.json())
      .then((data) => {
        this.events = data;
        this.loading = false;
      })
      .catch((err) => {
        console.error(err);
        this.loading = false;
      });
  },
};
</script>
