<template>
  <div>
    <select class="form-control select2">
      <option value></option>
    </select>
  </div>
</template>

<script>
export default {
  props: ["options"],
  mounted() {
    $(".select2").select2();
  }
};
</script>
