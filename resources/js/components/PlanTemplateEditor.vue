<template>
  <div class="table-responsive">
    <table class="table table-light table-borderless text-center mb-0">
      <tbody>
        <tr>
          <td class="bg-primary text-white"></td>
          <td class="bg-primary text-white">Monday</td>
          <td class="bg-primary text-white">Tuesday</td>
          <td class="bg-primary text-white">Wednesday</td>
          <td class="bg-primary text-white">Thursday</td>
          <td class="bg-primary text-white">Friday</td>
          <td class="bg-primary text-white">Saturday</td>
          <td class="bg-primary text-white">Sunday</td>
        </tr>
        <tr>
          <td class="bg-secondary align-middle">Breakfast</td>
          <td class="p-1">
            <!-- Monday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Tuesday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Wednesday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Thursday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Friday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Saturday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Sunday breakfast -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
        </tr>
        <tr>
          <td class="bg-secondary align-middle">Lunch</td>
          <td class="p-1">
            <!-- Monday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Tuesday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Wednesday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Thursday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Friday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Saturday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Sunday lunch -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
        </tr>
        <tr>
          <td class="bg-secondary align-middle">Dinner</td>
          <td class="p-1">
            <!-- Monday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Tuesday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Wednesday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Thursday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Friday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Saturday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
          <td class="p-1">
            <!-- Sunday dinner -->
            <button class="btn plan-template-btn">Enabled</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
    props: ['template'],
    mounted() {
        console.log(this.template);
    }
};
</script>

<style>
</style>