import axiosHttpTransport from '@/services/axiosHttpTransport';
import MessageRepository from './contracts/MessageRepository';
import HttpMessageRepository from './http/HttpMessageRepository';

const messageRepository: MessageRepository = new HttpMessageRepository(axiosHttpTransport);

export default messageRepository;
