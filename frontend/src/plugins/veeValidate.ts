import { extend, setInteractionMode } from 'vee-validate';
import {
  required,
  email,
  confirmed,
  min,
} from 'vee-validate/dist/rules';

setInteractionMode('eager');

extend('required', {
  ...required,
  message: '{_field_} can not be empty',
});

extend('email', {
  ...email,
  message: 'Email must be valid',
});

extend('confirmed', {
  ...confirmed,
  message: 'This field must match',
});

extend('min', {
  ...min,
  params: ['length', 'name'],
  message: 'Your {name} must be at least {length} characters',
});
