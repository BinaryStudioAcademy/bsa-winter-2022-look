import { generateCommandName } from '@/bundles/common/helpers/storeHelpers';

const namespace = 'chat';

export function getChatCommandName(command: string): string {
  return generateCommandName(
    namespace,
    command,
  );
}

export default namespace;
