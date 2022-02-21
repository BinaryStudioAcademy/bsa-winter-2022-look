import { generateCommandName } from '@/bundles/common/helpers/storeHelpers';

const namespace = 'auth';

export function getAuthCommandName(command: string): string {
  return generateCommandName(
    namespace,
    command,
  );
}

export default namespace;
