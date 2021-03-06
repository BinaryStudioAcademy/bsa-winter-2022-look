import { extend } from 'vee-validate';
import {
  required,
  email,
  confirmed,
  min,
  max,
} from 'vee-validate/dist/rules';

extend('required', {
  ...required,
  message: '{_field_} can not be empty',
});

extend('required_password', {
  ...required,
  message: 'Password can not be empty',
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

extend('max', {
  ...max,
  params: ['length', 'name'],
  message: 'Your {name} about yourself must be no more {length} characters',
});

extend('phone', {
  validate(value) {
    const phoneReg = /^\+[0-9]{2}\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/;
    return phoneReg.test(value);
  },
  message: 'Phone must be valid',
});
