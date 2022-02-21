import axiosHttpTransport from '@/services/axiosHttpTransport';
import UserRepository from './contracts/UserRepository';
import HttpUserRepository from './http/HttpUserRepository';

const userRepository: UserRepository = new HttpUserRepository(axiosHttpTransport);

export default userRepository;
