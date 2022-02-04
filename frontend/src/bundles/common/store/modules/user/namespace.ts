import { generateCommandName } from '@/bundles/common/helpers/storeHelpers';

const namespace = 'user';

export function getUserCommandName(command: string): string {
  return generateCommandName(
    namespace,
    command,
  );
}

export default namespace;
