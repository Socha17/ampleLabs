// tests/js/components/AppContainer.spec.js
import Vue from 'vue'
import { mount } from '@vue/test-utils';
import expect from 'expect';
import VModal from 'vue-js-modal'
Vue.use(VModal)
import AppContainer from '../../../resources/js/components/AppContainer.vue';

describe('AppContainer.vue', () => {
  it('says that it is an example component', () => {
    const wrapper = mount(AppContainer);
    expect(wrapper.html()).toContain('div id="app">');
  });
});
